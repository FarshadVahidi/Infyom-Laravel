# CentOS 8
FROM centos:8

RUN sed -i 's/mirrorlist/#mirrorlist/g' /etc/yum.repos.d/CentOS-Linux-* &&\
    sed -i 's|#baseurl=http://mirror.centos.org|baseurl=http://vault.centos.org|g' /etc/yum.repos.d/CentOS-Linux-*

# Setup EPEL & Remi repositories
RUN dnf install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
RUN dnf install -y https://rpms.remirepo.net/enterprise/remi-release-8.rpm

# Customize .bashrc
RUN echo -e "alias ll='ls -ltr --color'\nalias ls='ls --color'" >> /root/.bashrc

# Install Development Package (gcc,g++,make)
RUN dnf group install -y "Development Tools"

# Install Web Server (nginx)
RUN dnf install -y nginx 

# Setup nginx
WORKDIR /var/www/html

RUN chown -R nginx:nginx /var/www/html

RUN chmod -R 755 /var/www

RUN rm -rf /var/www/html/bootstrap/cache/config.php

RUN mkdir /etc/nginx/sites-avaiable
RUN mkdir /etc/nginx/sites-enabled

COPY config/nginx.conf   /etc/nginx/nginx.conf
COPY config/default.conf /etc/nginx/sites-enabled/default.conf
COPY config/www.conf /etc/php.fpm.d/www.conf

RUN curl -sL https://rpm.nodesource.com/setup_12.x | bash -

# Install common packages
RUN dnf install -y  vim             \
                    nano            \
                    curl            \
                    wget            \
                    gnupg           \
                    autoconf        \
                    unixODBC-devel

# Install & Configure PHP 8.1
RUN dnf module enable -y php:remi-8.1
RUN dnf install -y  php             \
                    php-fpm         \
                    php-curl        \
                    php-devel       \
                    php-common      \
                    libxslt         \
                    php-xml         \
                    php-json        \
                    php-redis       \
                    php-phar        \
                    php-pear        \
                    php-soap        \
                    php-iconv       \
                    php-openssl     \
                    php-session     \
                    php-mbstring    \
                    php-pdo_mysql   \
                    php-odbc        \
                    php-ctype       \
                    php-gd          \
                    php-xmlreader   \
                    php-zip         \
                    php-zlib        
                
RUN pecl install xdebug


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

COPY config/xdebug.ini /etc/php.d/30-xdebug.ini
COPY config/php.ini /etc/php.ini
COPY config/odbc.ini /etc/odbc.ini


WORKDIR /var/www/html

RUN mkdir /run/php-fpm

EXPOSE 80
CMD /usr/sbin/php-fpm -D && nginx -g "daemon off;" && php artisan config:cache
#ENTRYPOINT ["/usr/sbin/nginx", "-g", "daemon off;"]
#CMD ["-c", "/etc/nginx/nginx.conf"]
#ENTRYPOINT ["/usr/bin/supervisord"]
