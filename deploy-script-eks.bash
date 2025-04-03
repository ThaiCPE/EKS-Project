#!/bin/bash

# This script is used for manual deployment and configuration of resources on EKS

# Set region and cluster name
REGION="us-east-1"
CLUSTER_NAME="my-eks-cluster"

# Update kubeconfig for EKS cluster
echo "Updating kubeconfig for EKS cluster..."
aws eks update-kubeconfig --region $REGION --name $CLUSTER_NAME
if [ $? -ne 0 ]; then
  echo "Failed to update kubeconfig. Exiting."
  exit 1
fi

# Associate OIDC provider with the cluster
echo "Associating OIDC provider with EKS cluster..."
eksctl utils associate-iam-oidc-provider --region $REGION --cluster $CLUSTER_NAME --approve
if [ $? -ne 0 ]; then
  echo "Failed to associate OIDC provider. Exiting."
  exit 1
fi

# Create Service Account for Load Balancer
echo "Creating IAM service account for AWS Load Balancer Controller..."
eksctl create iamserviceaccount \
  --cluster $CLUSTER_NAME \
  --namespace kube-system \
  --name aws-load-balancer-controller \
  --attach-policy-arn arn:aws:iam::195275633219:policy/AWSLoadBalancerControllerIAMPolicy \
  --approve
if [ $? -ne 0 ]; then
  echo "Failed to create IAM service account for load balancer. Exiting."
  exit 1
fi

# Create Service Account for Secret Manager Access
echo "Creating IAM service account for Secret Manager access..."
eksctl create iamserviceaccount \
  --cluster $CLUSTER_NAME \
  --namespace default \
  --name wordpress-sa \
  --attach-policy-arn arn:aws:iam::195275633219:policy/SecretsManagerAccessPolicy \
  --approve
if [ $? -ne 0 ]; then
  echo "Failed to create IAM service account for secret manager access. Exiting."
  exit 1
fi

# Install the AWS Load Balancer Controller using Helm
echo "Installing AWS Load Balancer Controller using Helm..."
helm repo add eks https://aws.github.io/eks-charts
helm repo update
helm install aws-load-balancer-controller eks/aws-load-balancer-controller \
  -n kube-system \
  --set clusterName=$CLUSTER_NAME \
  --set serviceAccount.create=false \
  --set serviceAccount.name=aws-load-balancer-controller \
  --set aws.region=$REGION \
  --set vpcId=vpc-0605c9b5b2d90999f
if [ $? -ne 0 ]; then
  echo "Failed to install load balancer controller. Exiting."
  exit 1
fi

# Apply Kubernetes manifests (Deployment, Service, Ingress, HPA)
echo "Deploying Kubernetes resources..."
kubectl apply -f deployment.yaml
kubectl apply -f service.yaml
kubectl apply -f ingress.yaml
kubectl apply -f hpa.yaml
if [ $? -ne 0 ]; then
  echo "Failed to apply Kubernetes resources. Exiting."
  exit 1
fi

echo "Deployment completed successfully."
