FROM alpine:latest

# Install Apache, PHP, MariaDB, phpMyAdmin
RUN apk add --no-cache \
    apache2 \
    apache2-utils \
    php83 \
    php83-apache2 \
    php83-mysqli \
    php83-pdo_mysql \
    php83-session \
    php83-json \
    php83-mbstring \
    php83-openssl \
    php83-ctype \
    php83-phar \
    php83-iconv \
    php83-xml \
    mariadb \
    mariadb-client \
    phpmyadmin

# Create required directories
RUN mkdir -p /run/apache2 /run/mysqld

# Fix permissions
RUN chown -R apache:apache /var/www/localhost/htdocs
RUN chown -R mysql:mysql /var/lib/mysql

# Initialize MariaDB
RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql

# Expose port
EXPOSE 80

# Start both MariaDB and Apache
CMD sh -c "mysqld_safe --datadir=/var/lib/mysql & httpd -D FOREGROUND"