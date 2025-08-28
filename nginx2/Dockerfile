# Start from the official Nginx image
FROM nginx:latest

# Set working directory (not strictly needed for Nginx, but good practice)
WORKDIR /usr/share/nginx/html/

COPY ./default.conf /etc/nginx/conf.d/default.conf

# (Optional) Copy your static website files if needed
COPY ./html/ .

# Expose port 80 (and 443 if you plan to use HTTPS)
EXPOSE 8081

# Use Nginx as the main process
CMD ["nginx", "-g", "daemon off;"]
