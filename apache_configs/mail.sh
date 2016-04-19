# Create Apache2 Vhost conf
# --------------------
VHOST=$(cat <<EOF

<VirtualHost *:80>
    ServerName mail.$1
    ProxyPreserveHost On
    ProxyRequests Off
    ProxyVia Off
    ProxyPass / http://$2:1080/
    ProxyPassReverse / http://$2:1080/
</VirtualHost>
EOF
)

echo "$VHOST" > /etc/apache2/sites-available/mail.conf
a2ensite mail
service apache2 reload
