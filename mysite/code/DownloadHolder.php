<?php

class DownloadHolder extends Page {
	static $has_one = array(
		'PlatformImage' => 'Image'
	);

	static $allowed_children = array(
		'DownloadHolder',
		'DownloadPage'
	);
	
	static $icon = "themes/openra/images/treeicons/download-group";
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Content.Images', $imgField = new ImageField('PlatformImage'));
		$imgField->setFolderName('images/platforms');
		
		return $fields;
	}
}

class DownloadHolder_Controller extends Page_Controller {

	function ChildrenCacheKey() {
		$children = $this->Children();
		$children->sort('LastEdited', 'DESC');
		return $children->First()->LastEdited;
	}
}

?>
