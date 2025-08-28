FROM php:8.2-apache

WORKDIR /var/www/html

COPY index.php .

# Configure PHP-FPM to listen on TCP 9000
RUN sed -i 's|^listen = .*|listen = 0.0.0.0:9000|' /usr/local/etc/php-fpm.d/www.conf
# Expose PHP-FPM port for Nginx1 TCP connection
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]
