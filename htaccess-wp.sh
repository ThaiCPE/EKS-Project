#!/bin/bash
WP_DIR="/var/www/html"

cat > ${WP_DIR}/.htaccess << 'EOL'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]

# HTTP to HTTPS redirect (behind ALB)
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Standard WordPress rewrites
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
EOL

# Set permissions
chmod 644 ${WP_DIR}/.htaccess
chown www-data:www-data ${WP_DIR}/.htaccess

# Restart Apache
systemctl restart apache2