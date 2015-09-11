FROM phusion/baseimage:0.9.17

# Use baseimage-docker's init system.
CMD ["/sbin/my_init"]

# Enable PHP 5.6 repo and update apt-get
RUN echo "deb http://ppa.launchpad.net/ondrej/php5-5.6/ubuntu trusty main" >> /etc/apt/sources.list && \
    apt-key adv --keyserver keyserver.ubuntu.com --recv-key E5267A6C && \
    apt-get update

# Install and Test PHP
RUN apt-get install --no-install-recommends -y \
		curl ca-certificates \
		php5-fpm \
		php5-cli \
		php5-dev \
		php5-xdebug \
		php5-apcu \
		php5-json \
		php5-memcached php5-memcache \
		php5-mysql\
		php5-sqlite \
		php5-mcrypt  \
		php5-intl \
		php5-imagick php5-gd \
		php5-imap \
		php5-curl

# Setup PHP
RUN sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php5/fpm/php-fpm.conf
RUN sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/" /etc/php5/fpm/php.ini
RUN sed -i 's#^display_errors = Off#display_errors = On#' /etc/php5/fpm/php.ini

ENV PHP_TIMEZONE="Europe/Berlin"
RUN find /etc/php5 -name php.ini -print0 | xargs -0 sed -i "s#;date.timezone =.*#date.timezone = $PHP_TIMEZONE#"

# Ensure the mode is correct on the unix socket
RUN sed -i 's#;listen.mode = 0660#listen.mode = 0666#g' /etc/php5/fpm/pool.d/www.conf
RUN sed -i 's#listen = /var/run/php5-fpm.sock#listen = 0.0.0.0:9000#g' /etc/php5/fpm/pool.d/www.conf

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

CMD ["php5-fpm"]

