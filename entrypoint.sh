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

# Call the original WordPress entrypoint
exec docker-entrypoint.sh "$@"
