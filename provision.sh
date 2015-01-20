# Install wordpress
curl https://wordpress.org/latest.zip > /home/vagrant/wordpress.zip
unzip /home/vagrant/wordpress.zip -d /home/vagrant
rsync -a /home/vagrant/wordpress/. /var/www/public
rm -r /home/vagrant/wordpress
rm /home/vagrant/wordpress.zip

# Increase MySQL memory limits
cp "/var/www/public/wp-config-sample.php" "/var/www/public/wp-config.php"

sudo sh -c 'sed -r -i "s/database_name_here/wordpress/" /var/www/public/wp-config.php'
sudo sh -c 'sed -r -i "s/username_here/root/" /var/www/public/wp-config.php'
sudo sh -c 'sed -r -i "s/password_here//" /var/www/public/wp-config.php'

ln -s /vagrant/how-secure-is-my-password /var/www/public/wp-content/plugins/how-secure-is-my-password

# Restart Apache
sudo service httpd restart

# Create databases
echo "CREATE DATABASE wordpress CHARACTER SET utf8 COLLATE utf8_general_ci" | mysql -u root
echo "GRANT ALL PRIVILEGES ON *.* TO  'root'@'%'  IDENTIFIED BY ''" | mysql -u root
