#!/bin/bash
set -ex

# Install kubectl and aws-iam-authenticator
curl -LO "https://dl.k8s.io/release/$(curl -L -s https://dl.k8s.io/release/stable.txt)/bin/linux/amd64/kubectl"
chmod +x kubectl && mv kubectl /usr/local/bin/

# Configure kubeconfig with proper authentication
aws eks update-kubeconfig --name my-eks-cluster --region us-east-1 \
  --role-arn arn:aws:iam::195275633219:role/codebuild-WordPressBuild-service-role

# Verify cluster access
kubectl get nodes

# Apply Kubernetes manifests
kubectl apply -f Deployment.yaml -f service.yaml -f ingress.yaml -f hpa.yaml

# Verify deployment
kubectl get pods -n default