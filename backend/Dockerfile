FROM php:7.3-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Copy app code
COPY ./index.php /var/www/html/


RUN apk update && apk add --no-cache bash

# Create socket directory for PHP-FPM
RUN mkdir -p /sock \
    && chown -R www-data:www-data /sock


# Configure PHP-FPM to use socket instead of TCP port
RUN sed -i 's|^listen = .*|listen = /sock/php-fpm.sock|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.owner = .*|listen.owner = www-data|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.group = .*|listen.group = www-data|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.mode = .*|listen.mode = 0660|' /usr/local/etc/php-fpm.d/www.conf

# Expose port only if needed (not used with socket, optional)
EXPOSE 9000

# Start PHP-FPM

CMD ["php-fpm"]
