<?php

class NewsHolder extends Page {
	static $db = array(
	);
	static $has_one = array(
	);
	
	static $allowed_children = array(
		'NewsPage'
	);
	
	static $icon = "themes/openra/images/treeicons/news";
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
	
	function SortedChildren()
	{
		$children = $this->Children();
		
		if (!$children) return null;
		
		$children->sort('Date', 'DESC');
		
		return $children;
	}
	
	function CommentsTimeout() {
		return (int)(time() / 60 / 5);
	}
}

?>
