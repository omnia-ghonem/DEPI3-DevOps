FROM php:fpm
# Set working directory
WORKDIR /code

# Create socket directory for PHP-FPM
RUN mkdir -p /run/php/php-fpm.sock \
    && chown -R www-data:www-data /run/php/php-fpm.sock


# Configure PHP-FPM to use socket instead of TCP port
#RUN sed -i 's|^listen = .*|listen = /var/run/php7-fpm.sock|' /usr/local/etc/php-fpm.d/www.conf \
#    && sed -i 's|^;listen.owner = .*|listen.owner = www-data|' /usr/local/etc/php-fpm.d/www.conf \
#    && sed -i 's|^;listen.group = .*|listen.group = www-data|' /usr/local/etc/php-fpm.d/www.conf \
#    && sed -i 's|^;listen.mode = .*|listen.mode = 0660|' /usr/local/etc/php-fpm.d/www.conf


# Start PHP-FPM

CMD ["php-fpm"]
