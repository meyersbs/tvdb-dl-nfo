#!/bin/bash

# Remove previous installation
sudo rm -rf /opt/tvdb/

# Copy executable to /usr/local/bin/
sudo cp tvdb-dl-nfo.php /usr/local/bin/tvdb-dl-nfo
sudo chmod +x /usr/local/bin/tvdb-dl-nfo

# Download dependencies
composer require adrenth/thetvdb2

# Move dependencies to /opt/tvdb/
sudo mkdir /opt/tvdb/
sudo mkdir /opt/tvdb/composer/
sudo mv ./vendor /opt/tvdb/composer/vendor
sudo chmod ug+r /opt/tvdb/composer/vendor

# Create /opt/tvdb/apikey.txt
sudo touch /opt/tvdb/apikey.txt
