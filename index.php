<?php
require_once "class_rssmerge.php";

$rss = new RSSMerger();
require_once("feed-list.php");
$rss->sort();
?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>IronbloggerADN RSSmerger</title>
	<meta name="description" content="A simple RSS feeds merge script" />
	<meta name="keywords" content="rss, merge, feed" />
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		h1 {
			font-size: 2em;
			font-weight: normal;
			font-family: serif;
		}
		ul {
			list-style-type: square;
		}
		ul li {
			padding: .3em 0;
		}
		.small {
			font-size: 0.8em;
		}
		.gray {
			color: gray;
		}
		a.sitelink {
			text-decoration: none;
			color: #444;
		}
		a.sitelink:HOVER {
			text-decoration: underline;
		}
	</style>
</head>
<body>

<div class="feeds">
	<h1>Inoffizieller IronbloggerADN-Feed</h1>
	<p><a href="feed.php" rel="rss">RSS feed</a></p>
	<ul>
<?php
$feeds = $rss->getFeeds(20);
foreach($feeds as $f) {
?>
		<li>
			<a href="<?php echo $f->link; ?>"><?php echo $f->title; ?></a><br />
			<span class="small gray"><?php echo date("l, F j Y",intval($f->time)); ?> from <a href="<?php echo $f->sitelink; ?>" class="sitelink"><?php echo $f->sitetitle; ?></a></span>
		</li>
<?php } ?>
	</ul>
</div>

</body>
</html>
