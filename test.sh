#!/bin/bash

# Retrieve the secret from AWS Secrets Manager
SECRET_JSON=$(aws secretsmanager get-secret-value --secret-id rds-db-secret --query SecretString --output text)

# Check if the secret was retrieved successfully
if [ $? -ne 0 ] || [ -z "$SECRET_JSON" ]; then
  echo "❌ Error: Failed to retrieve secret from AWS Secrets Manager"
  exit 1
fi

# Parse the secret JSON
echo "$SECRET_JSON" | jq -r .host
echo "$SECRET_JSON" | jq -r .username
echo "$SECRET_JSON" | jq -r .password
echo "$SECRET_JSON" | jq -r .dbname