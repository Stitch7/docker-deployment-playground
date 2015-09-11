#!/usr/bin/env bash

docker tag images/php-fpm 10.0.0.5/php-fpm
docker push 10.0.0.5/php-fpm

docker tag images/nginx 10.0.0.5/nginx
docker push 10.0.0.5/nginx
