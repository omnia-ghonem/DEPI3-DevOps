# Start from the official Nginx image
FROM nginx:latest

# Set working directory (not strictly needed for Nginx, but good practice)
WORKDIR /usr/share/nginx/html/

# Copy your custom Nginx configuration into the container
COPY default.conf /etc/nginx/conf.d/default.conf


# Expose port 80 (and 443 if you plan to use HTTPS)
EXPOSE 80

# Use Nginx as the main process
CMD ["nginx", "-g", "daemon off;"]
