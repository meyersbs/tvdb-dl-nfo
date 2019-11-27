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
```

## TheTVDB API Key

You need an API key from [TheTVDB.com](https://www.thetvdb.com) in order to use this script. You can obtain one by logging into [TheTVDB.com](https://www.thetvdb.com), clicking on **API ACCESS** under your name, and following the directions. Once you have the key, copy it into `/opt/tvdb/apikey.txt` and save. Your key will look something like this: **0UPW4KREL4SYZJG2**.

## Usage

Simply run `tvdb-dl-nfo <<SHOWID>>`, where `<<SHOWID>>` is a show ID you grabbed from [TheTVDB.com](https://www.thetvdb.com).

## Example

Let's try downloading the `.NFO` file for [The Office](https://www.thetvdb.com/series/the-office-us).

``` bash
    tvdb-dl-nfo 73244
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

## Attribution

TV information is provided by [TheTVDB.com](https://www.thetvdb.com), but we are not endorsed or certified by [TheTVDB.com](https://www.thetvdb.com) or its affiliates.

## Contact

Benjamin S. Meyers < ben@lionlogic.dev >

## Contributing

I welcome suggestions for features, but they are more likely to be accepted if you submit a pull-request.
