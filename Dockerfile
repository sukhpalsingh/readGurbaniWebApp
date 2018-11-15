FROM ubuntu:latest

MAINTAINER Sukhpal Singh<sukhpalsingh@users.noreply.github.com>

ENV DEBIAN_FRONTEND noninteractive

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN apt-get update && apt-get -y upgrade

RUN DEBIAN_FRONTEND=noninteractive apt-get -y install \
    apache2 php7.2 php7.2-mysql php7.2-mbstring php7.2-xml libapache2-mod-php7.2 curl lynx-common lynx \
    nodejs npm git

# Enable apache mods.
RUN a2enmod php7.2
RUN a2enmod rewrite

RUN npm install gulp-cli -g && npm install -g bower
RUN npm install gulp gulp-uglify gulp-rename gulp-concat gulp-header gulp-minify-css gulp-watch

# Update the PHP.ini file, enable <? ?> tags and quieten logging.
RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.2/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.2/apache2/php.ini

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer

# Expose apache.
EXPOSE 80

# Copy this repo into place.
ADD . /var/www/site

# Update the default apache site with the config we created.
ADD docker/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# install dependencies
RUN composer install

# By default start up apache in the foreground, override with /bin/bash for interative.
CMD /usr/sbin/apache2ctl -D FOREGROUND
