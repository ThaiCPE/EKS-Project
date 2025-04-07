#!/bin/bash
# Retrieve the secret from AWS Secrets Manager
SECRET_JSON=$(aws secretsmanager get-secret-value --secret-id eksproject-db-secret --query SecretString --output text)
# Check if the secret was retrieved successfully
if [ $? -ne 0 ] || [ -z "$SECRET_JSON" ]; then
  echo " Error: Failed to retrieve secret from AWS Secrets Manager"
  exit 1
fi
# Parse the secret JSON
export WORDPRESS_DB_HOST=$(echo "$SECRET_JSON" | jq -r .host)
export WORDPRESS_DB_USER=$(echo "$SECRET_JSON" | jq -r .username)
export WORDPRESS_DB_PASSWORD=$(echo "$SECRET_JSON" | jq -r .password)
export WORDPRESS_DB_NAME=$(echo "$SECRET_JSON" | jq -r .dbname)
# Validate values
if [ -z "$WORDPRESS_DB_HOST" ] || [ -z "$WORDPRESS_DB_USER" ] || [ -z "$WORDPRESS_DB_PASSWORD" ] || [ -z "$WORDPRESS_DB_NAME" ]; then
  echo " Error: One or more database credentials are missing."
  exit 1
fi
# Check DB connection
echo " Testing database connection..."
if ! mysql -h "$WORDPRESS_DB_HOST" -u "$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" "$WORDPRESS_DB_NAME" -e "exit"; then
  echo " Error: Unable to connect to database."
  exit 1
fi

# Update wp-config.php with the database credentials
echo "🛠 Updating wp-config.php with database credentials..."

# Only add database definitions if they don't already exist
if ! grep -q "define.*DB_NAME" /var/www/html/wp-config.php; then
  # Insert database credentials right after the opening comment block closes with */
  sed -i '/\*\//a\
\
// ** MySQL settings - You can get this info from your web host ** //\
define( '\''DB_NAME'\'', '\'''"$WORDPRESS_DB_NAME"'\''\'' );\
define( '\''DB_USER'\'', '\'''"$WORDPRESS_DB_USER"'\''\'' );\
define( '\''DB_PASSWORD'\'', '\'''"$WORDPRESS_DB_PASSWORD"'\''\'' );\
define( '\''DB_HOST'\'', '\'''"$WORDPRESS_DB_HOST"'\''\'' );' /var/www/html/wp-config.php
fi

# Set permissions
chown www-data:www-data /var/www/html/wp-config.php
chmod 640 /var/www/html/wp-config.php

echo "WordPress configuration completed successfully!"

# Start Apache
exec apache2-foreground