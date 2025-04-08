FROM public.ecr.aws/bitnami/wordpress:latest

# Install Apache and necessary dependencies
RUN apt-get update && \
    apt-get install -y apache2 curl unzip jq mariadb-client && \
    curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip" && \
    unzip awscliv2.zip && \
    ./aws/install && \
    rm -rf awscliv2.zip aws && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp 

# Copy custom wp-config.php (if required)
COPY wp-config.php /var/www/html/wp-config.php

# Copy custom themes
COPY ./simple-theme /var/www/html/wp-content/themes/simple-theme
COPY ./Word-Web /var/www/html/wp-content/themes/Word-Web

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose WordPress port
EXPOSE 80

# Override the default entrypoint
ENTRYPOINT ["entrypoint.sh"]

# Start Apache in the foreground
#CMD ["apache2ctl", "-D", "FOREGROUND"]
