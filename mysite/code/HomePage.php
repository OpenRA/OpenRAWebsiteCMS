<?php

class HomePage extends Page {
	static $db = array(
	);
	
	static $has_one = array(
	);
	
	static $icon = "themes/openra/images/treeicons/home";
}

class HomePage_Controller extends Page_Controller {
	static $allowed_actions = array(
		'syncdownloads'
	);

	public function init() {
		parent::init();
	}

	function syncdownloads() {
		Filesystem::sync();
	}
	
	public function Platform() {
		$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$windows = new ArrayData(array('Name' => 'win', 'Desc' => 'Windows'));
		$linux = new ArrayData(array('Name' => 'linux', 'Desc' => 'GNU/Linux'));
		$mac = new ArrayData(array('Name' => 'osx', 'Desc' => 'OS X'));
		if (strpos($user_agent, "x11") !== FALSE || strpos($user_agent, "linux") !== FALSE)
			return new ArrayData(array('Main' => $linux, 'Other1' => $windows, 'Other2' => $mac));
		else if (strpos($user_agent, "mac") !== FALSE)
			return new ArrayData(array('Main' => $mac, 'Other1' => $windows, 'Other2' => $linux));
		else
			return new ArrayData(array('Main' => $windows, 'Other1' => $mac, 'Other2' => $linux));
	}
	
	function LatestNews($num=5) {
		$news = DataObject::get_one("NewsHolder");
		return ($news) ? DataObject::get("NewsPage", "ParentID = $news->ID", "Date DESC", "", $num) : false;
	}
	
	function Screenshot() {
		$screenshotsFolder = Folder::findOrMake("images/screenshots");
		if (!$screenshotsFolder->hasChildren()) return null;
				
		$children = $screenshotsFolder->Children();
		while(true)	{
			$rand = rand(0, $children->Count());
			$a = $children->toArray();
			if ($a[$rand])
				return $a[$rand]->getRelativePath();
		}
	}
	
	function CommentsTimeout() {
		return (int)(time() / 60 / 5);
	}
	
	function DownloadSum() {
		return $this->Aggregate('DownloadCount')->Sum('Count') + 30023;
	}
	
	function GamesPlayed() {
		return file_get_contents(Director::baseFolder() . '/games.txt');
	}
}

?>
