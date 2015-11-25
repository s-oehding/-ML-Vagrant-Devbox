# Create Apache2 Vhost conf
# --------------------
VHOST=$(cat <<EOF
<VirtualHost *:80>
    ServerAdmin webmaster@localhost

    DocumentRoot /var/www/adminer
    ServerName adminer.$1
    ServerAlias www.adminer.$1 adminer.*.xip.io

    <Directory /var/www/adminer/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
    </Directory>

    ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
    <Directory "/usr/lib/cgi-bin">
        AllowOverride All
        Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
        Order allow,deny
        Allow from all
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log

    # Possible values include: debug, info, notice, warn, error, crit,
    # alert, emerg.
    LogLevel warn

    CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
EOF
)

echo "$VHOST" > /etc/apache2/sites-available/adminer.conf
a2ensite adminer
service apache2 reload
