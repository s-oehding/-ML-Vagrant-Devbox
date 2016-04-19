# Create Apache2 Vhost conf
# --------------------
VHOST=$(cat <<EOF

<VirtualHost *:80>
    ServerName mail.$1
    ProxyPreserveHost On
    ProxyRequests Off
    ProxyVia Off
    ProxyPass / $1:1080/
    ProxyPassReverse / $1:1080/
</VirtualHost>
EOF
)

echo "$VHOST" > /etc/apache2/sites-available/adminer.conf
a2ensite mail
service apache2 reload
