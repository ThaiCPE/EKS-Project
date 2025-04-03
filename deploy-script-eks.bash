#!/bin/bash
set -e

# Install kubectl
curl -LO "https://dl.k8s.io/release/$(curl -L -s https://dl.k8s.io/release/stable.txt)/bin/linux/amd64/kubectl"
chmod +x kubectl
mv kubectl /usr/local/bin/

# Update kubeconfig with proper IAM role
aws eks update-kubeconfig --name my-eks-cluster --region us-east-1 \
  --role-arn arn:aws:iam::195275633219:role/eks-cluster-role

# Verify access
kubectl get nodes

# Apply your manifests
kubectl apply -f Deployment.yaml -f service.yaml -f ingress.yaml -f hpa.yaml