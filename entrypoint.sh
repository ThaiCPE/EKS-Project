#!/bin/bash

# Retrieve the secret from AWS Secrets Manager
SECRET_JSON=$(aws secretsmanager get-secret-value --secret-id rds-db-secret --query SecretString --output text)

# Check if the secret was retrieved successfully
if [ $? -ne 0 ] || [ -z "$SECRET_JSON" ]; then
  echo "Error: Failed to retrieve secret from AWS Secrets Manager"
  exit 1
fi

# Parse the secret JSON using jq
export WORDPRESS_DB_HOST=$(echo $SECRET_JSON | jq -r .host)
export WORDPRESS_DB_USER=$(echo $SECRET_JSON | jq -r .username)
export WORDPRESS_DB_PASSWORD=$(echo $SECRET_JSON | jq -r .password)
export WORDPRESS_DB_NAME=$(echo $SECRET_JSON | jq -r .dbname)

# Ensure the environment variables are not empty
if [ -z "$WORDPRESS_DB_HOST" ] || [ -z "$WORDPRESS_DB_USER" ] || [ -z "$WORDPRESS_DB_PASSWORD" ] || [ -z "$WORDPRESS_DB_NAME" ]; then
  echo "Error: One or more database credentials are missing."
  exit 1
fi

# Check if the database is reachable
if ! mysql -h "$WORDPRESS_DB_HOST" -u "$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" "$WORDPRESS_DB_NAME" -e "exit"; then
  echo "Error: Cannot connect to the database."
  exit 1
fi

# Call the original WordPress entrypoint
exec docker-entrypoint.sh "$@"
