FROM php:8.2-fpm

WORKDIR /var/www/html
COPY index.php .

# Install extensions if needed
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configure PHP-FPM to listen on a Unix socket
RUN sed -i 's|^listen = .*|listen = /sock/php-fpm.sock|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^;listen.owner = .*|listen.owner = www-data|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^;listen.group = .*|listen.group = www-data|' /usr/local/etc/php-fpm.d/www.conf \
 && sed -i 's|^;listen.mode = .*|listen.mode = 0660|' /usr/local/etc/php-fpm.d/www.conf \
 && mkdir -p /sock && chown -R www-data:www-data /sock

CMD ["php-fpm"]
