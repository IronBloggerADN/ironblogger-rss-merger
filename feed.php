<?php 
require_once "class_rssmerge.php";
require_once "class_rssfeed.php";

$rss = new RSSMerger();
require_once("feed-list.php");
$rss->sort();

$xml = new RSSFeed("IronRSS","http://ironrss.lukasepple.de","IronbloggerADN RSS-Merger","http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
$xml->setLanguage("de");

$feeds = $rss->getFeeds(20);

foreach($feeds as $f) {
    $xml->addItem($f->title,$f->link,$f->description,$f->author,$f->guid,$f->time);
}
$xml->displayXML();
?>
