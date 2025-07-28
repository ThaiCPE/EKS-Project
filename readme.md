# 🚀 Project: Deploy Container Web App บน AWS

![GitHub last commit](https://img.shields.io/github/last-commit/ThaiCPE/EKS-Project)
![GitHub repo size](https://img.shields.io/github/repo-size/ThaiCPE/EKS-Project)

---

Project นี้แสดงให้เห็นถึงการ Deploy แบบครบวงจรของ Web App WordPress ที่ใช้ Container โดยใช้ Amazon EKS ซึ่ง Support Pipeline CI/CD ที่ทำงานอัตโนมัติอย่างสมบูรณ์, การจัดการ Secret ที่ปลอดภัย, และสถาปัตยกรรม AWS ที่ Scale ได้

มันจะช่วยเสริมสร้างประสบการณ์การปฏิบัติงานจริงในด้าน Kubernetes, บริการ AWS, ความปลอดภัยแบบ Cloud-native และระบบอัตโนมัติ DevOps

---

## 🗂️ สารบัญ

- [Highlight ของ Project](#-Highlight-ของ-Project)
- [ภาพรวมสถาปัตยกรรม](#-ภาพรวมสถาปัตยกรรม)
- [VPC Resource Map](#%EF%B8%8F-vpc-resource-map)
- [สรุปการ Deploy](#-สรุปการ-Deploy)
- [EKS Add-ons Configuration](#-eks-add-ons-configuration)
- [Achievements & Learning Outcomes](#-achievements--learning-outcomes)
- [Live Deployment](#-live-deployment)
- [Future Improvements](#-future-improvements)
- [Conclusion](#-conclusion)
- [Contact](#-contact)

---

## 🌟 Highlight ของ Project

🔧 **Version Control:** Git & GitHub สำหรับ Integrate CI/CD  
🐳 **Containerization:** Custom WordPress Docker Image ด้วย AWS CLI, WP-CLI, และ MariaDB Client  
🗄️ **AWS RDS (MariaDB):** Private Subnet, Encrypted at rest, ด้วย Automatic Backup  
☸️ **Amazon EKS:** Highly Available, Kubernetes Cluster ที่ Scale ได้ สำหรับจัดการ Container  
🛡️ **Pod Identity Agent:** Secure Pod Access ไปหา AWS Secrets Manager โดยไม่มีการ Hardcode Credential  
🔐 **Secrets Manager:** Dynamic Secret Injection ตอน Runtime ในการเชื่อมต่อกับ Database  
📦 **Amazon ECR:** Private Registry สำหรับเก็บ Docker Image  
⚙️ **AWS CodePipeline + CodeBuild:** Build & Deployment จาก GitHub ไปยัง EKS อัตโนมัติ  
🌍 **Route 53 & CloudFront:** DNS Routing & CDN เพื่อการเข้าถึงจากทั่วโลกที่เหมาะสม  
🧩 **Application Load Balancer + Ingress:** จัดการ HTTPS Traffic ด้วย SSL Redirect  
🔑 **IAM Roles & Policies:** ควบคุมการเข้าถึงบริการแบบละเอียด (สิทธิ์น้อยที่สุด (Least Privilege))  
📊 **CloudWatch & SNS:** Monitor Log, Metric, และการแจ้งเตือน Pipeline  
🛡️ **AWS WAF:** Web Security เพื่อป้องกันภัยคุกคาม OWASP Top 10  
🧩 **VPC Design:** Multi-AZ Custom VPC พรอ้ม Public/Private Subnet และ NAT Gateway

---

## 📐 ภาพรวมสถาปัตยกรรม

- **Platform:** Amazon EKS (Elastic Kubernetes Service)
- **Containerization:** Docker (Custom WordPress Image)
- **CI/CD:** AWS CodePipeline + CodeBuild
- **Registry:** Amazon ECR
- **Database:** Amazon RDS (MariaDB)
- **Secrets Management:** AWS Secrets Manager
- **Monitoring:** CloudWatch & Container Insights
- **Security:** WAF, ACM SSL, IAM Role, Private Subnet
- **Networking:** VPC, Subnet, ALB, NAT Gateway, Route 53, CloudFront

---

**Architecture Diagram:**  

$~$

![Architecture Diagram](https://github.com/BasilTAlias/EKS-Project/blob/main/images/architecture-diagram.png)

---

## 🛰️ VPC Resource Map

$~$

![VPC Resource Map](https://github.com/BasilTAlias/EKS-Project/blob/main/images/vpc-resources-screenshot.png)

---

## 🚀 สรุปการ Deploy

✅ Step 1: Fork Repo ไป GitHub
1. กด Fork Repo นี้ หรือ Clone ไปทำงานของตัวเอง
2. สร้าง CodePipeline แบบเชื่อม GitHub

✅ Step 2: สร้าง Amazon ECR สำหรับเก็บ Docker image  

<img width="1917" height="894" alt="image" src="https://github.com/user-attachments/assets/dd61d46f-30a1-4dfd-9242-62bb9d5f4e39" />  

จะได้ ECR URI เช่น: 73855636xx.dkr.ecr.ap-southeast-7.amazonaws.com/wordpress-eks

✅ Step 3: สร้าง EKS Cluster  

https://www.youtube.com/watch?v=6cOXFv-H2q4

🔄 Flow เป็นแบบนี้:

📦 1. CodeBuild ทำอะไร?
- CodeBuild ไป Clone GitHub Repo มา (ที่มี Dockerfile, wp-config.php ฯลฯ)
- แล้ว Build Image ตาม Dockerfile
- สร้าง Container Image และ Push ขึ้น ECR

🧱 2. Dockerfile ทำอะไร?
- Dockerfile สร้าง Image จาก Official WordPress + PHP + Apache
- เพิ่ม AWS CLI, MariaDB Client, WP-CLI
- Copy File ต่างๆ เข้าไป พวก Custom Theme (edublock, saas-software-technology, simple-theme) และ `wp-config.php` Template

🚀 3. พอ Deploy Container บน EKS มันทำงานยังไง?
✅ ตอน Container ถูก Run:
- ระบบจะไป Pull Image จาก ECR มา
- แล้ว Container จะ Run entrypoint.sh ที่อยู่ใน Image
- ใน entrypoint.sh จะมี Logic:
  - ไป ดึง Secret มาจาก AWS Secret Manager

    <img width="1919" height="897" alt="image" src="https://github.com/user-attachments/assets/29d4f5ed-eeaf-4317-901e-6c91309f6917" />
   
  - เอามา Update File `wp-config.php` ที่อยู่ใน Container
  - แล้ว Validates DB Connection ก่อน Startup

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

**Author:** ThaiCPE  
🔗 [Facebook](https://www.facebook.com/thaicpe)  
📂 [GitHub Project](https://github.com/ThaiCPE/EKS-Project)

---

