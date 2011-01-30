<?php

class NewsHolder extends Page {
	static $db = array(
	);
	static $has_one = array(
	);
	
	static $allowed_children = array(
		'NewsPage'
	);
}

class NewsHolder_Controller extends Page_Controller {
	function init() {
		RSSFeed::linkToFeed($this->Link() . "rss");
		parent::init();
	}

	function rss() {
		$rss = new RSSFeed($this->Children(), $this->Link(), "OpenRA News and Updates");
		$rss->outputToBrowser();
	}
}

?>
