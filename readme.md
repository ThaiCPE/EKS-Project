# 🚀 Project: Deploy Container Web App บน AWS

![GitHub last commit](https://img.shields.io/github/last-commit/BasilTAlias/EKS-Project)
![GitHub repo size](https://img.shields.io/github/repo-size/BasilTAlias/EKS-Project)

---

Project นี้แสดงให้เห็นถึงการ Deploy แบบครบวงจรของ Web App WordPress ที่ใช้ Container โดยใช้ Amazon EKS ซึ่ง Support Pipeline CI/CD ที่ทำงานอัตโนมัติอย่างสมบูรณ์, การจัดการ Secret ที่ปลอดภัย, และสถาปัตยกรรม AWS ที่ Scale ได้

มันจะช่วยเสริมสร้างประสบการณ์การปฏิบัติงานจริงในด้าน Kubernetes, บริการ AWS, ความปลอดภัยแบบ Cloud-native และระบบอัตโนมัติ DevOps

---

## 🗂️ สารบัญ

- [Highlight ของ Project](#-project-highlights)
- [Architecture Overview](#-architecture-overview)
- [VPC Resource Map](#-vpc-resource-map)
- [Deployment Summary](#-deployment-summary)
- [EKS Add-ons Configuration](#-eks-add-ons-configuration)
- [Achievements & Learning Outcomes](#-achievements--learning-outcomes)
- [Live Deployment](#-live-deployment)
- [Future Improvements](#-future-improvements)
- [Conclusion](#-conclusion)
- [Contact](#-contact)

---

## 🌟 Highlight ของ Project

🔧 **Version Control:** Git & GitHub for CI/CD integration.  
🐳 **Containerization:** Custom WordPress Docker image with AWS CLI, WP-CLI, and MariaDB client.  
🗄️ **AWS RDS (MariaDB):** Private subnet, encrypted at rest, with automatic backups.  
☸️ **Amazon EKS:** Highly available, scalable Kubernetes cluster for container orchestration.  
🛡️ **Pod Identity Agent:** Secure pod access to AWS Secrets Manager without hardcoded credentials.  
🔐 **Secrets Manager:** Dynamic secret injection at runtime for database connectivity.  
📦 **Amazon ECR:** Private registry for storing Docker images.  
⚙️ **AWS CodePipeline + CodeBuild:** Automated build & deployment from GitHub to EKS.  
🌍 **Route 53 & CloudFront:** DNS routing & CDN for optimized global reach.  
🧩 **Application Load Balancer + Ingress:** Managed HTTPS traffic with SSL redirection.  
🔑 **IAM Roles & Policies:** Fine-grained service access controls (least privilege).  
📊 **CloudWatch & SNS:** Monitoring logs, metrics, and pipeline notifications.  
🛡️ **AWS WAF:** Web security to protect against OWASP Top 10 threats.  
🧩 **VPC Design:** Multi-AZ custom VPC with public/private subnets and NAT Gateway.

---

## 📐 Architecture Overview

- **Platform:** Amazon EKS (Elastic Kubernetes Service)
- **Containerization:** Docker (custom WordPress image)
- **CI/CD:** AWS CodePipeline + CodeBuild
- **Registry:** Amazon ECR
- **Database:** Amazon RDS (MariaDB)
- **Secrets Management:** AWS Secrets Manager
- **Monitoring:** CloudWatch & Container Insights
- **Security:** WAF, ACM SSL, IAM roles, Private Subnets
- **Networking:** VPC, Subnets, ALB, NAT Gateway, Route 53, CloudFront

---

**Architecture Diagram:**  

$~$

![Architecture Diagram](https://github.com/BasilTAlias/EKS-Project/blob/main/images/architecture-diagram.png)

---

## 🛰️ VPC Resource Map

$~$

![VPC Resource Map](https://github.com/BasilTAlias/EKS-Project/blob/main/images/vpc-resources-screenshot.png)

---

## 🚀 Deployment Summary

### 📦 Dockerfile Highlights

- Built on official WordPress + PHP + Apache image
- Added AWS CLI, MariaDB client, WP-CLI
- Copied custom themes and `wp-config.php`

### 🔐 Entrypoint Script (`entrypoint.sh`)

- Retrieves database secrets from Secrets Manager
- Updates `wp-config.php` at runtime
- Validates DB connection before startup

### ☸️ Kubernetes Manifests

- **Deployment.yaml:** 2 replicas with resource requests & limits
- **Service.yaml:** ClusterIP for internal service exposure
- **Ingress.yaml:** ALB with HTTPS and automatic HTTP → HTTPS redirection
- **Hpa.yaml:** Horizontal Pod Autoscaler (min 2 pods, max 5 pods)

### 🔄 CI/CD Pipeline

- Automated: GitHub → CodePipeline → CodeBuild → EKS
- Builds Docker image → Pushes to ECR → Deploys to EKS
- Alerts via SNS and logs in CloudWatch

$~$

![Pipeline Image](https://github.com/BasilTAlias/EKS-Project/blob/main/images/Codebuild.png)

---

## 🔌 EKS Add-ons Configuration

| Add-On | Purpose |
|--------|---------|
| **VPC CNI** | Enables pod networking inside the VPC |
| **CoreDNS** | Service discovery within the Kubernetes cluster |
| **kube-proxy** | Routes network traffic to appropriate services |
| **Metrics Server** | Collects pod metrics for HPA scaling |
| **Pod Identity Agent** | Secure, pod-level AWS service access |
| **CloudWatch Container Insights** | Real-time monitoring of pods & nodes |
| **ExternalDNS** *(optional)* | Auto-manages Route 53 DNS entries |

> ✅ Add-ons make the cluster production-ready with observability, security, and scalability.

---

## 🏆 Achievements & Learning Outcomes

✅ Designed and deployed a production-grade, multi-AZ VPC architecture.  
✅ Automated full CI/CD pipeline for container build & deployment.  
✅ Secured workload access with Pod Identity Agent and Secrets Manager.  
✅ Integrated AWS observability tools (CloudWatch, SNS, Container Insights).  
✅ Configured Kubernetes HPA for auto-scaling based on resource metrics.  
✅ Enabled HTTPS and WAF for secure, public web access.  
✅ Successfully hosted a globally accessible WordPress site with CloudFront and Route 53.

---

## 🌐 Live Deployment

🔗 **Website:** [https://basiltalias.site](https://basiltalias.site)

📸 **Admin Panel:**  

$~$
![Admin Screenshot](https://github.com/BasilTAlias/EKS-Project/blob/main/images/wordpress-admin.png)

$~$

📸 **Website Frontend:**  

$~$

![Frontend Screenshot](https://github.com/BasilTAlias/EKS-Project/blob/main/images/wordpress-site.png)

$~$
---

## 🌱 Future Improvements

- 🔁 **Terraform:** Infrastructure as code for automated provisioning
- 📊 **Prometheus + Grafana:** Advanced monitoring dashboards
- 🌍 **Multi-region Failover:** For higher availability & DR
- 🔐 **IAM Fine-Tuning:** Service-level access controls

---

## 🧠 Conclusion

This project significantly enhanced my practical understanding of:

- Kubernetes orchestration on AWS
- Secure secret management at runtime
- Automated CI/CD pipeline with GitHub and AWS tools
- Cloud-native application design following AWS best practices

💡 *Major challenges solved:*  
✔️ Secure secret injection using Pod Identity Agent  
✔️ HTTPS setup with ALB and ACM SSL  
✔️ Automated scaling and monitoring with HPA and CloudWatch  

> *"Building cloud-native applications is about scaling trust, security, and performance — not just infrastructure."*

---


📝 Medium Article

I also wrote a Medium article that walks through this project step-by-step:

Title: Deploying a Scalable WordPress Application on AWS EKS with CI/CD and Secrets Management

Link: https://medium.com/@basiltaliaz/deploying-a-scalable-wordpress-application-on-aws-eks-with-ci-cd-and-secrets-management-ead38653fdcd

---

## 📇 Contact

**Author:** Basil Thekkanath Alias  
🔗 [LinkedIn](https://www.linkedin.com/in/basil-t-alias/)  
📂 [GitHub Project](https://github.com/BasilTAlias/EKS-Project)

---

