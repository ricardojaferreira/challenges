FROM composer:latest AS composer
FROM ubuntu:latest

MAINTAINER Ricardo Ferreira<ricarraf@gmail.com>

RUN apt-get update && apt-get upgrade -y

RUN apt-get install apache2 -y
RUN a2enmod rewrite

COPY ./docker/apache-php/etc/apache2/sites-available/ /etc/apache2/sites-available/
COPY ./files /var/www/html

RUN DEBIAN_FRONTEND=noninteractive apt-get install php -y \
	&& apt-get install php-fpm -y \
	&& apt-get install php-mysql -y \ 
	&& apt-get install libapache2-mod-php \
	&& apt-get install php-cli \
	&& apt-get install php-xml -y \
	&& apt-get install php-dom \
	&& apt-get install php-opcache \
	&& apt-get install php-memcached -y \ 
	&& apt-get install php-gd -y \
	&& apt-get install php-mbstring -y \
	&& apt-get install php-zip -y \
	&& apt-get install php-soap -y \
	&& apt-get install php-xsl \ 
	&& apt-get install php-xml -y \
	&& apt-get install php-curl -y \
	&& apt-get install php-bcmath -y \
	&& apt-get install php-dev -y \
	&& apt-get install php-xdebug \
	&& apt-get clean

#copy composer to image and allow run as root
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

#Set up apache environment
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

#Add an editor because we need one
RUN apt-get install vim -y

WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html/*

EXPOSE 80

CMD apachectl -D FOREGROUND

