#!/bin/bash

# Install kubectl
echo "Downloading kubectl..."
curl -o kubectl https://amazon-eks.s3.us-west-2.amazonaws.com/1.21.2/2021-07-05/bin/linux/amd64/kubectl || { echo "Failed to download kubectl"; exit 1; }

echo "Making kubectl executable..."
chmod +x ./kubectl

echo "Moving kubectl to /usr/local/bin/..."
mv ./kubectl /usr/local/bin/

# Build phase
echo "Deploying to EKS cluster..."

# Check if AWS CLI is installed
aws --version || { echo "AWS CLI not found"; exit 1; }

# Check if AWS credentials are working
aws sts get-caller-identity || { echo "AWS CLI credentials not working"; exit 1; }

# List EKS clusters
aws eks list-clusters --region us-east-1 || { echo "Failed to list EKS clusters"; exit 1; }

# Check if the cluster exists
echo "Checking cluster existence..."
aws eks describe-cluster --name my-eks-cluster --region us-east-1 || { echo "Failed to describe cluster my-eks-cluster"; exit 1; }

# Update kubeconfig to use the EKS cluster
echo "Updating kubeconfig for my-eks-cluster..."
aws eks update-kubeconfig --name my-eks-cluster --region us-east-1 --debug || { echo "Failed to update kubeconfig"; exit 1; }

# Verify kubectl version
kubectl version || { echo "kubectl not working"; exit 1; }

# Apply Kubernetes manifests
echo "Applying Deployment.yaml..."
kubectl apply -f Deployment.yaml || { echo "Failed to apply Deployment.yaml"; exit 1; }

echo "Applying service.yaml..."
kubectl apply -f service.yaml || { echo "Failed to apply service.yaml"; exit 1; }

echo "Applying ingress.yaml..."
kubectl apply -f ingress.yaml || { echo "Failed to apply ingress.yaml"; exit 1; }

echo "Applying hpa.yaml..."
kubectl apply -f hpa.yaml || { echo "Failed to apply hpa.yaml"; exit 1; }

echo "Deployment to EKS completed successfully."
