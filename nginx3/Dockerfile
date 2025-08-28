FROM nginx:latest

WORKDIR /usr/share/nginx/html/

COPY ./html/ /usr/share/nginx/html/
COPY ./default.conf /etc/nginx/conf.d/default.conf
EXPOSE 80

# Use Nginx as the main process
CMD ["nginx", "-g", "daemon off;"]