FROM phusion/baseimage:0.9.17

CMD ["/sbin/my_init"]

RUN apt-get update && apt-get install -y python-software-properties
RUN add-apt-repository ppa:nginx/stable
RUN apt-get update && apt-get install -y nginx

RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log

RUN rm /etc/nginx/sites-enabled/default
RUN rm /etc/nginx/sites-available/default
ADD ./customer.local /etc/nginx/sites-available/
RUN ln -sf /etc/nginx/sites-available/customer.local /etc/nginx/sites-enabled/customer.local

RUN mkdir -p /etc/service/nginx
ADD start.sh /etc/service/nginx/run
RUN chmod +x /etc/service/nginx/run

EXPOSE 80


# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

CMD ["nginx", "-g", "daemon off;"]