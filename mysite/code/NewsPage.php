<?php

class NewsPage extends Page {
	static $db = array(
		'Date' => 'SS_Datetime',
	);
	static $has_one = array(
		'Author' => 'Member'
	);
	static $defaults = array(
		'ProvideComments' => true
	);
	static $allowed_children = "none";
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Content.Main', $datetimeField = new DatetimeField('Date', 'News Date/Time'), 'Content');
		$datetimeField->dateField->setConfig('showcalendar', 'true');
		$authors = DataObject::get('Member');
		if ($authors) {
			$authors = $authors->toDropdownMap('ID', 'Title', '(Select one)', true);
		}
		$fields->addFieldToTab('Root.Content.Main', new DropdownField('AuthorID', 'Author', $authors), 'Content');
		
		return $fields;
	}
	
	public function populateDefaults() {
		$this->Date = SS_Datetime::now();
		$this->AuthorID = Member::currentUser()->ID;
		parent::populateDefaults();
	}
}

class NewsPage_Controller extends Page_Controller {
	function init() {
//		RSSFeed::linkToFeed($this->Link() . "rss");
		parent::init();
	}
}

?>
