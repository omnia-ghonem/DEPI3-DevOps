FROM nginx:latest


COPY ./default.conf /etc/nginx/conf.d/default.conf
EXPOSE 8060

# Use Nginx as the main process
CMD ["nginx", "-g", "daemon off;"]