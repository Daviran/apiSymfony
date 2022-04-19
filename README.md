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

![Commented configuration](https://raw.githubusercontent.com/EpitechMscProPromo2024/T-WEB-600-LIL-6-1-ecommerce-david.bugnon/master/Doc/sshd_conf.png?token=GHSAT0AAAAAABTWN4V2AAOH66TYYKXGMKPYYS6OTQA)

Change it in order to get this:

![Setup configuration](https://raw.githubusercontent.com/EpitechMscProPromo2024/T-WEB-600-LIL-6-1-ecommerce-david.bugnon/master/Doc/sshd_conf_new.png?token=GHSAT0AAAAAABTWN4V2DSSIFOFDPUKIW4KKYS6OULQ)

Then, copy the key on remote using:
```
ssh-copy-id -i [path/to/your/pubkey] root@[remote ip address]
```
Make sure the ip address is correctly setup in the ansible project directory in the hosts file


## Click and deploy
In order for the mariaDB role to work, you have to install an ansible module
```
ansible-galaxy collection install community.mysql
```
At this point, you should be able to deploy the server using the following command:
```
ansible-playbook playbook.yml -i [path/to/ansible/project]
```

### Cosmetic, yet mandatory feature
Let's write a line in your /etc/hosts
```
sudo vim /etc/hosts
```
Who said DNS was hard ?
```
[remote address ip]    simpfunny.epi
```

## Visit and Buy
```
http://simpfunny:80
```

# Enjoy !
