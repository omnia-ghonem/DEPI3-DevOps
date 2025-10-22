# DEPI3-DevOps
Tasks

## Task 1 — Connect Two Containers using Port connection
### Description

- First container use image "nginx:latest" and this is the container that contain the html file as frontend that will appear when you mapped localhost port to exposed port 8050
- The docker file that create the image of the first container exists in Task-1/TCP-Port/nginx-port/Dockerfile
- The configuration file of container 1 that decide the exposed port of the container will show which .html file, this appear in this part:
    listen 8050;
    location / {
        root /usr/share/nginx/html;
        index index.html;
        try_files $uri $uri/ /index.php?$args;
    }
- The port connection is occured by deciding the ip:port of the container that is decided to be connected, this appear in this part:
  upstream php-fpm {
        server 172.35.0.2:9000; # ⬅️ talk to PHP-FPM via subnet ip or hostname 172.35.0.2:9000 or php-port:9000

}
- The folder that first container will connect to at second container is /var/www/html, this appear in this part:
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_index index.php;
        # SCRIPT_FILENAME must match the path in PHP container
        fastcgi_param SCRIPT_FILENAME /var/www/html$fastcgi_script_name;
        fastcgi_pass php-fpm;   # ⬅️ talk to PHP-FPM via shared socket
    }
- Second container use image "php:fpm" and this container contain .php file as backend
- The docker file that create the image of the second container exists in Task-1/TCP-Port/php-port/Dockerfile

- These 2 containers exists at same network

- The 2 containers can be run using docker compose and instead of choose an image docker file of image of each container its path with respect to path of the docker compose can be added at build: section



## Task 5 — Kubernetes Cluster Installation using Ansible
### Description

## Overview
This project automates the setup of a complete **Kubernetes Cluster (1 Master + Multiple Worker Nodes)** using **Ansible**. It eliminates manual setup and ensures consistency across nodes, making it ideal for DevOps automation, infrastructure-as-code (IaC) learning, and scalable deployments.

---

## Features
- Full automation of **Kubernetes installation** on CentOS 10 systems.
- Configuration of **Docker**, **containerd**, and **Calico CNI** networking.
- Automatic setup of **firewall**, **kernel modules**, and **sysctl parameters**.
- SSH key-based authentication for seamless Ansible connections.
- Separate **YAML playbooks** for master and worker node installation.
- Logging, privilege escalation, and connection optimization in Ansible configuration.

---

## Repository Structure
```
├── ansible.cfg
├── hosts.ini
├── master_worker_playbook.yml
├── kubeadm_join_token.sh (auto-generated)
└── README.md
```

---

## Configuration Details
### Ansible Configuration (ansible.cfg)
```ini
[defaults]
inventory = /home/ansible/kubernete_install/hosts.ini
remote_user = ansible
host_key_checking = False
forks = 50
log_path = /var/log/ansible.log

[privilege_escalation]
become = True
become_method = sudo
become_user = root
become_ask_pass = False

[ssh_connection]
ssh_args = -o ControlMaster=auto -o ControlPersist=60s
```

### Inventory File (hosts.ini)
```ini
[master]
node1 ansible_host= ansible_user=ansible ansible_become_pass=

[worker]
node3 ansible_host= ansible_user=ansible ansible_become_pass=
node4 ansible_host= ansible_user=ansible ansible_become_pass=
```

---

## Setup Instructions
1. **Clone the repository**:
   ```bash
   git clone https://github.com/omnia-ghonem/kubernetes-ansible-setup.git
   cd kubernetes-ansible-setup
   ```

2. **Set the Ansible configuration path**:
   ```bash
   export ANSIBLE_CONFIG=/home/ansible/kubernete_install/ansible.cfg
   ```

3. **Run the playbooks**:
   ```bash
   ansible-playbook master_worker_playbook.yml
   ```

4. **Verify the cluster**:
   ```bash
   kubectl get nodes
   ```

---

## Output
After running the playbooks, you’ll have:
- A **fully functional Kubernetes cluster** with 1 master and multiple worker nodes.
- Docker, containerd, and Calico CNI installed and configured.
- SSH automation for streamlined management.

---

## Use Cases
- **Infrastructure as Code (IaC)** learning.
- Automated **DevOps pipeline setup** for Kubernetes.
- Deploying and testing **containerized applications** on on-premise clusters.

---

## Author
**Omnia Nabil Gharieb Abd Alfatah**  
Machine Learning & DevOps Engineer  
📧 omnia.ghonem@ejust.edu.eg  
🔗 [LinkedIn](https://linkedin.com/in/omnia-ghonem) | [GitHub](https://github.com/omnia-ghonem)