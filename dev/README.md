# docker-test App

## Setup

1. vagrant up
During this process there will be a docker-host created (ip: 10.0.0.6).
2. vagrant ssh
3. cd /vagrant
4. run ./vagrant/build-images.sh
This step is needed to build all the container images required for running this app
5. docker-compose up -d
Now docker-compose orchestrate the setup of the different containers (see docker-compose.yml)

## Logs
Use "docker-compose logs" to view the output of all containers combined

### MySQL
MySQL is available with the following credentials (.env-dev)
- user: admin
- pw: admin
- db: customer
The root password is "root"
- port: 33060 (is forwarded from the docker-host to use any MySQL-Gui)


### Composer
During "docker-compose up -d " composer will install (once) all dependencies through it´s controller
Be careful: Check "docker-compose logs" in another terminal to view the output of its install-process
