<?php

class HomePage extends Page {
	static $db = array(
	);
	
	static $has_one = array(
	);
}

class HomePage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		Requirements::set_write_js_to_body(false);
		Requirements::javascript('mysite/javascript/jquery-1.4.2.min.js');
		Requirements::javascript('mysite/javascript/jquery.cycle.min.js');
	}
	
	public function Platform() {
		$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if (strpos($user_agent, "x11") !== FALSE || strpos($user_agent, "linux") !== FALSE)
			return new ArrayData(array('Main' => 'Linux', 'Other1' => 'Windows', 'Other2' => 'OS X'));
		else if (strpos($user_agent, "mac") !== FALSE)
			return new ArrayData(array('Main' => 'OS X', 'Other1' => 'Windows', 'Other2' => 'Linux'));
		else
			return new ArrayData(array('Main' => 'Windows', 'Other1' => 'OS X', 'Other2' => 'Linux'));
	}
	
	function LatestNews($num=5) {
		$news = DataObject::get_one("NewsHolder");
		return ($news) ? DataObject::get("NewsPage", "ParentID = $news->ID", "Date DESC", "", $num) : false;
	}
}

?>
