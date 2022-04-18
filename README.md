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
Then, copy the key on remote using:
```
ssh-copy-id -i [path/to/your/pubkey] [remote ip address]
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
