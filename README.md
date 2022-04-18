#EPITECH E-COMMERCE PROJECT

##SIMP-FUNNY

Stack used: 
- [Symfony](symfony.com)
- [Ansible](ansible.com)
- [Angular](angular.com)

## Setup SSH Key connection
First, create a ssh-key using:
```
ssh-keygen
```
You'll need to allow root ssh connection. On your VM, go to
```
cd /etc/ssh/
```
and
```
nano sshd_config
```
You should find a whole commented configuration:
![Commented configuration](https://github.com/EpitechMscProPromo2024/T-WEB-600-LIL-6-1-ecommerce-david.bugnon/tree/master/Doc/sshd_conf.png?raw=true)

Change it in order to get this:
![Setup configuration](https://github.com/EpitechMscProPromo2024/T-WEB-600-LIL-6-1-ecommerce-david.bugnon/tree/master/Doc/sshd_conf_new.png?raw=true)

Then, copy the key on remote using:
```
ssh-copy-id -i [path/to/your/pubkey] root@[remote ip address]
```
Make sure the ip address is correctly setup in the ansible project directory in the hosts file


## Click and deploy
In order for the mariaDB role to work, you have ton install and ansible module
```
ansible-galaxy collection install community.mysql
```
At this point, you should be able to deploy the server using the following command:
```
ansible-playbook playbook.yml -i [path/to/ansible/project]
```

## Visit and Buy
```
simp-funny:80
```

# Enjoy !
