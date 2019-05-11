#!/usr/bin/env php

<?php

function seriesToXML($series, &$xml){
	$xml->addchild('status', $series->getStatus());
	$xml->addchild('title', str_replace('&', '&amp;', $series->getSeriesName()));
        $xml->addchild('year', substr($series->getFirstAired(), 0, 4));
        $xml->addchild('plot', str_replace('&', '&amp;', $series->getOverview()));
	$episodeguide = $xml->addchild('episodeguide');
	$episodeguide->addchild('url', 'http://thetvdb.com/api/F9C450E78D99172E/series/' . $series->getId() . '/all/en.zip');
	$xml->addchild('mpaa', $series->getRating());
	$xml->addchild('id', $series->getId());
	$genres = $series->getGenre();
	foreach($genres as $key => $value) {
		$xml->addchild('genre', $value);
	}
	$xml->addchild('premiered', $series->getFirstAired());
	$xml->addchild('studio', $series->getNetwork());
	$xml->addchild('runtime', $series->getRuntime());
	return $xml;
}

function xmlToFile($xml){
	$dom = new DOMDocument('1.0', 'utf-8');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($xml->asXML());
	$dom->save(getcwd() . '/tvshow.nfo');
}

require '/opt/tvdb/composer/vendor/autoload.php';

use Adrenth\Thetvdb\Client;

$apikey = file_get_contents('/opt/tvdb/apikey.txt', false);
$apikey = str_replace(array("\r", "\n", "\t", " "), '', $apikey);

# Get command line arguments
$showID = $argv[1];

# Talk to TheTVDB API
$client = new \Adrenth\Thetvdb\Client();
$client->setLanguage('en');

# Authenticate to TheTVDB API
$token = $client->authentication()->login($apikey);
$client->setToken($token);

# Get Series Info
$series = $client->series()->get($showID);
print('Found show "' . $series->getSeriesName() . '"');

# Convert Series Info into XML Object
$series_xml = new SimpleXMLElement('<tvshow/>');
$series_xml = seriesToXML($series, $series_xml);

# Save XML Object to disk with formatting
xmlToFile($series_xml);

?>

