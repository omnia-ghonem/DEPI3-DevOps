# DEPI3-DevOps
Tasks

## Task 1 — Connect Two Containers using Port connection
### Description

- First container use image "nginx:latest" and this is the container that contain the html file as frontend that will appear when you mapped localhost port to exposed port 8050
- The docker file that create the image of the first container exists in Task-1/TCP-Port/nginx-port/Dockerfile
- The configuration file of container 1 that decide the exposed port of the container will show which .html file, this appear in this part:
    listen 8050;
    location / {
        root /usr/share/nginx/html;
        index index.html;
        try_files $uri $uri/ /index.php?$args;
    }
- The port connection is occured by deciding the ip:port of the container that is decided to be connected, this appear in this part:
  upstream php-fpm {
        server 172.35.0.2:9000; # ⬅️ talk to PHP-FPM via subnet ip or hostname 172.35.0.2:9000 or php-port:9000

}
- The folder that first container will connect to at second container is /var/www/html, this appear in this part:
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_index index.php;
        # SCRIPT_FILENAME must match the path in PHP container
        fastcgi_param SCRIPT_FILENAME /var/www/html$fastcgi_script_name;
        fastcgi_pass php-fpm;   # ⬅️ talk to PHP-FPM via shared socket
    }
- Second container use image "php:fpm" and this container contain .php file as backend
- The docker file that create the image of the second container exists in Task-1/TCP-Port/php-port/Dockerfile

- These 2 containers exists at same network

- The 2 containers can be run using docker compose and instead of choose an image docker file of image of each container its path with respect to path of the docker compose can be added at build: section
