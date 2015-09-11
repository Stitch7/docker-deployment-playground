#!/usr/bin/env bash

apt-get update
#install docker
apt-get install -y wget
wget -qO- https://get.docker.com/gpg | apt-key add -
wget -qO- https://get.docker.com/ | sh
#setup docker group
usermod -aG docker vagrant
# install docker-compose
curl -L https://github.com/docker/compose/releases/download/1.3.3/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
