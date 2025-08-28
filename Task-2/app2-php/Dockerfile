FROM php:8.2-apache

WORKDIR /var/www/html

COPY ./html/index.php /var/www/html/index.php

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache
RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]

