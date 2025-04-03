#!/bin/bash

# Retrieve the secret from AWS Secrets Manager
SECRET_JSON=$(aws secretsmanager get-secret-value --secret-id rds-db-secret --query SecretString --output text)

# Check if the secret was retrieved successfully
if [ -z "$SECRET_JSON" ]; then
  echo "Error: Failed to retrieve secret from AWS Secrets Manager"
  exit 1
fi

# Parse the secret JSON using jq
export WORDPRESS_DB_HOST=$(echo $SECRET_JSON | jq -r .host)
export WORDPRESS_DB_USER=$(echo $SECRET_JSON | jq -r .username)
export WORDPRESS_DB_PASSWORD=$(echo $SECRET_JSON | jq -r .password)
export WORDPRESS_DB_NAME=$(echo $SECRET_JSON | jq -r .dbname)

# Print the environment variables (for debugging)
echo "WORDPRESS_DB_HOST: $WORDPRESS_DB_HOST"
echo "WORDPRESS_DB_USER: $WORDPRESS_DB_USER"
echo "WORDPRESS_DB_PASSWORD: $WORDPRESS_DB_PASSWORD"
echo "WORDPRESS_DB_NAME: $WORDPRESS_DB_NAME"

# Wait for the database to be ready
until mysqladmin ping -h"$WORDPRESS_DB_HOST" --user="$WORDPRESS_DB_USER" --password="$WORDPRESS_DB_PASSWORD" --silent; do
  echo "Waiting for database connection..."
  sleep 5
done

# Ensure WordPress is installed
if ! wp core is-installed --path=/var/www/html --allow-root; then
  wp core install \
    --url="https://basiltalias.site" \
    --title="My WordPress Site" \
    --admin_user="admin" \
    --admin_password="admin123" \
    --admin_email="basiltaliaz77@gmail.com" \
    --path=/var/www/html \
    --allow-root
fi

# Ensure the custom theme is installed before activating
if wp theme is-installed my-custom-theme --path=/var/www/html --allow-root; then
  echo "Activating my-custom-theme..."
  wp theme activate my-custom-theme --path=/var/www/html --allow-root
else
  echo "Error: Theme 'my-custom-theme' not found. Skipping activation."
fi

# Set correct file permissions
chown -R www-data:www-data /var/www/html/wp-content
chmod -R 755 /var/www/html/wp-content

# Flush WordPress cache
wp cache flush --path=/var/www/html --allow-root

# Check if the template file exists
if [ -f "/var/www/html/wp-content/themes/my-custom-theme/template-2048.php" ]; then
  PAGE_ID=$(wp post create \
    --post_type=page \
    --post_title="2048 Game" \
    --post_status=publish \
    --post_name="2048-game" \
    --page_template="template-2048.php" \
    --path=/var/www/html \
    --allow-root \
    --format=ids)
else
  echo "Error: Template file not found. Creating page without a custom template."
  PAGE_ID=$(wp post create \
    --post_type=page \
    --post_title="2048 Game" \
    --post_status=publish \
    --post_name="2048-game" \
    --path=/var/www/html \
    --allow-root \
    --format=ids)
fi

# Check if the page was created successfully
if [ -z "$PAGE_ID" ]; then
  echo "Error: Failed to create 2048 Game page"
  exit 1
fi

# Set the 2048 game page as the homepage
wp option update show_on_front "page" --path=/var/www/html --allow-root
wp option update page_on_front "$PAGE_ID" --path=/var/www/html --allow-root

# Call the original WordPress entrypoint
exec docker-entrypoint.sh "$@"
