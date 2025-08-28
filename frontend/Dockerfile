# Start from the official Nginx image
FROM nginx:latest

# Set working directory (not strictly needed for Nginx, but good practice)
WORKDIR /usr/share/nginx/html/

# Copy your custom Nginx configuration into the container
COPY default.conf /etc/nginx/conf.d/default.conf

# (Optional) Copy your static website files if needed
COPY ./html/index.html /usr/share/nginx/html/index.html


# Expose port 3000 (and 443 if you plan to use HTTPS)
EXPOSE 90

# Use Nginx as the main process
CMD ["nginx", "-g", "daemon off;"]



# 1️⃣ What default.conf does

# default.conf defines how Nginx serves requests inside the container, including:

# The document root (root /usr/share/nginx/html;)

# Server name

#Any proxying rules (like passing PHP requests to a backend)

# In frontend container, our frontend is just a static HTML page (index.html).