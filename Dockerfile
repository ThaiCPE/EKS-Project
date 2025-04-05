# Use the official WordPress image
FROM wordpress:latest

# Install necessary dependencies (including aws CLI, jq, and mysql-client)
RUN apt-get update && \
    apt-get install -y curl unzip jq mariadb-client && \
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

# Copy updated custom theme with 2048 game
#COPY ./my-custom-theme /var/www/html/wp-content/themes/my-custom-theme

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Override the default entrypoint
ENTRYPOINT ["entrypoint.sh"]

# Expose WordPress port
EXPOSE 80

# Start the default WordPress entrypoint
CMD ["apache2-foreground"]
