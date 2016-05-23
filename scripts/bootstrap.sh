#!/usr/bin/env bash

#Set Variables passed from Vagrantfile
# --------------------
vm_ip="$1"
vm_hostname="$2"
vm_url="$3"
dbname="$4"
dbuser="$5"
dbpass="$6"

# Set MySQL root password
# --------------------
debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password root'

# Install packages
# --------------------
apt-get -qq update
add-apt-repository -y ppa:ondrej/php
apt-get -qq update
apt-get -y install apache2
echo "ServerName localhost" >> /etc/apache2/apache2.conf
apt-get -y install php5.6-fpm
apt-get -y install libapache2-mod-php5.6
apt-get -y install php5.6-mysql php5.6-curl php5.6-dev php5.6-gd php5.6-intl php-pear php5.6-imap php5.6-mcrypt php5.6-ming php5.6-ps php5.6-pspell php5.6-recode php5.6-snmp php5.6-sqlite php5.6-tidy php5.6-xmlrpc php5.6-xsl php5.6-apc php5.6-simplexml php5.6-gd php5.6-mbstring php5.6-zip
apt-get -y install libsqlite3-dev
apt-get -y install python-software-properties
apt-get -y install build-essential

apt-add-repository ppa:brightbox/ruby-ng-experimental &&
apt-get -qq update
apt-get install -y ruby2.0 ruby2.0-dev ruby2.0-doc

apt-get -y install git pv
apt-get -y install tofrodos

# Install Mysql
# Ignore the post install questions
export DEBIAN_FRONTEND=noninteractive
apt-get -q -y install mysql-server-5.6

# Set timezone
# --------------------
echo "Europe/Berlin" | tee /etc/timezone
dpkg-reconfigure --frontend noninteractive tzdata

# Apache changes
# --------------------
a2enmod rewrite
a2enmod proxy
a2enmod proxy_http
# create virtualhosts
fromdos /var/apache_configs/adminer.sh
fromdos /var/apache_configs/dashboard.sh
fromdos /var/apache_configs/mail.sh
fromdos /var/apache_configs/shopware.sh
sh /var/apache_configs/adminer.sh $vm_url
sh /var/apache_configs/dashboard.sh $vm_url
sh /var/apache_configs/mail.sh $vm_url $vm_ip
sh /var/apache_configs/shopware.sh $vm_url

rm /var/www/html/index.html

service apache2 restart

# Setup database
# --------------------
echo "FLUSH PRIVILEGES" | mysql -uroot -proot
echo "DROP DATABASE IF EXISTS test" | mysql -uroot -proot
echo "DROP DATABASE IF EXISTS $dbname" | mysql -uroot -proot
echo "CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpass'" | mysql -uroot -proot
echo "CREATE DATABASE $dbname" | mysql -uroot -proot
echo "GRANT ALL ON $dbname.* TO '$dbuser'@'localhost'" | mysql -uroot -proot
echo "FLUSH PRIVILEGES" | mysql -uroot -proot
sleep 10

# Install Mailcatcher
# --------------------
echo "Installing mailcatcher"
gem install mailcatcher
# mailcatcher --http-ip=$vm_ip

# Configure PHP
# --------------------
sed -i '/;sendmail_path =/c sendmail_path = "/usr/local/bin/catchmail"' /etc/php/5.6/apache2/php.ini
sed -i '/display_errors = Off/c display_errors = On' /etc/php/5.6/apache2/php.ini
sed -i '/error_reporting = E_ALL & ~E_DEPRECATED/c error_reporting = E_ALL | E_STRICT' /etc/php/5.6/apache2/php.ini
sed -i '/html_errors = Off/c html_errors = On' /etc/php/5.6/apache2/php.ini
sed -i '/memory_limit = 128M/c memory_limit = 512M' /etc/php/5.6/apache2/php.ini
sed -i '/upload_max_filesize = 2M/c upload_max_filesize = 6M' /etc/php/5.6/apache2/php.ini
sudo sed -i '1izend_extension = /usr/lib/php/20131226/ioncube_loader_lin_5.6.so' /etc/php/5.6/apache2/php.ini

# Install IonCube Loader
# --------------------
cd /var/www
if [ ! -d "ioncube" ]; then
  wget -q http://downloads3.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz
  tar xvfz ioncube_loaders_lin_x86-64.tar.gz
  rm ioncube_loaders_lin_x86-64.tar.gz
  sudo cp /var/www/ioncube/ioncube_loader_lin_5.6.so /usr/lib/php/20131226
  sudo touch /etc/php/5.6/apache2/conf.d/20-ioncube.ini
  echo "zend_extension = /usr/lib/php/20131226/ioncube_loader_lin_5.6.so" >> /etc/php/5.6/apache2/conf.d/20-ioncube.ini
fi

# Install Adminer
# --------------------
clear
cd /var/www
if [ ! -d "adminer" ]; then
  echo "Adminer not found at /var/www and will be installed..."
  sleep 5
  mkdir /var/www/adminer
  wget -qO /var/www/adminer/index.php http://downloads.sourceforge.net/adminer/adminer-4.0.3.php

  echo "Adminer installed... Use Use http://adminer.$vm_url/ URL to use it."
fi

# Make sure things are up and running as they should be
# --------------------
service apache2 restart
