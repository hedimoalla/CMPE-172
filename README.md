# CMPE-172

HW1:
Instructions to make the project run:

Place all files in /etc/ansible/
Run these commands:
```
cd /etc/ansible
```
To deploy:
```
ansible-playbook -i "localhost," -c local hello_world.yml
```
To un-deploy:
```
ansible-playbook -i "localhost," -c local undeploy_hello_world.yml
```
Launch your browser and type:
```
http://127.0.0.1
```

Hello World from SpaceFleet
