# tvdb-dl-nfo

## Description

Download TV show `.NFO` files from [TheTVDB.com](https://www.thetvdb.com).

## Motivation

You've gone through all of the trouble of ripping your TV shows from the DVD/BluRay disks that you've purchased, and you want to organize your media for ingestion via popular media servers, like [Plex](https://plex.tv), [Kodi](https://kodi.tv/), or [Emby](https://emby.media/) -- commonly, `.NFO` files are used to store metadata about a TV show, which can be parsed and imported into the database of whichever media server solution you prefer. Unfortunately, the `.NFO` downloader you use failed to parse some of your directories. Rather than manually creating the `.NFO` file, this tool does it for you!

## Environment

All code and commands below were tested in Ubuntu 18.04 and *should* work in other linux distributions. I do not develop for Windows. I cannot guarantee that any of this will work in Windows.

## Dependencies

**PHP**:

``` bash
    # PHP 7.2+
    sudo apt install php7.2-common
    
    # mbstring
    sudo apt install php7.2-mbstring
    
    # xml
    sudo apt install php7.2-xml
```

**Composer**:

``` bash
    # Composer
    sudo apt install composer
```

## Installation

``` bash
    git clone https://github.com/meyersbs/tvdb-dl-nfo.git
    cd tvdb-dl-nfo
    chmod +x install.sh
    ./install.sh
```

Running `./install.sh` will do the following:

``` bash
    # Copy executable to /usr/local/bin/tvdb-dl-nfo
    sudo cp tvdb-dl-nfo.php /usr/local/bin/tvdb-dl-nfo
    
    # Make sure it's executable
    sudo chmod +x /usr/local/bin/tvdb-dl-nfo

    # Download PHP dependencies with composer
    composer require adrenth/thetvdb2

    # Install PHP dependencies to /opt/composer/vendor
    sudo mkdir /opt/composer
    sudo mv ./vendor /opt/composer/vendor
    
    # Make sure the dependency directory is readable
    sudo chmod ug+r /opt/composer/vendor
```

## TheTVDB API Key

You need an API key from [TheTVDB.com](https://www.thetvdb.com) in order to use this script. You can obtain one by logging into [TheTVDB.com](https://www.thetvdb.com), clicking on **API ACCESS** under your name, and following the directions.

## Usage

Simply run `tvdb-dl-nfo <<APIKEY>> <<SHOWID>>`, where `<<APIKEY>>` is the key you obtained in the previous section, and `<<SHOWID>>` is a show ID you grabbed from [TheTVDB.com](https://www.thetvdb.com). Your key will look something like this: **0UPW4KREL4SYZJG2**.

## Example

Let's try downloading the `.NFO` file for [The Office](https://www.thetvdb.com/series/the-office-us).

``` bash
    tvdb-dl-nfo 0UPW4KREL4SYZJG2 73244
```

Running the command above will save a file called `tvshow.nfo` in your current working directory. The file will look something like the following, depending on the available metadata for the given show:

```
    <?xml version="1.0"?>
    <tvshow>
      <status>Ended</status>
      <title>The Office (US)</title>
      <year>2005</year>
      <plot>A fresh and funny mockumentary-style glimpse into the daily interactions of the eccentric
            workers at the Dunder Mifflin paper supply company. This fast-paced comedy parodies
            contemporary American water-cooler culture.
      </plot>
      <episodeguide>
        <url>http://thetvdb.com/api/F9C450E78D99172E/series/73244/all/en.zip</url>
      </episodeguide>
      <mpaa>TV-14</mpaa>
      <id>73244</id>
      <genre>Comedy</genre>
      <premiered>2005-03-24</premiered>
      <studio>NBC</studio>
      <runtime>25</runtime>
    </tvshow>
```

## License

See [LICENSE](LICENSE).

## Contact

Benjamin S. Meyers < ben@lionlogic.org >

## Contributing

I welcome suggestions for features, but they are more likely to be accepted if you submit a pull-request.
