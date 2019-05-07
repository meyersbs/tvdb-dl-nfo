#!/bin/bash

sudo cp tvdb-dl-nfo.php /usr/local/bin/tvdb-dl-nfo
sudo chmod +x /usr/local/bin/tvdb-dl-nfo

composer require adrenth/thetvdb2

sudo mkdir /opt/composer/
sudo mv ./vendor /opt/composer/vendor
sudo chmod ug+r /opt/composer/vendor
