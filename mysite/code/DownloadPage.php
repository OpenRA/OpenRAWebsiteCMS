<?php

class DownloadPage extends Page {
	static $db = array(
		'Folder' => 'Text',
		'FilePattern' => 'Text'
	);

	static $has_one = array(
		'PlatformImage' => 'Image'
	);

	static $allowed_children = 'none';
	
	static $icon = 'themes/openra/images/treeicons/download';
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Content.Images', $imgField = new ImageField('PlatformImage'));
		$imgField->setFolderName('images/platforms');
		
		$fields->addFieldToTab('Root.Content.Main', new TextField('Folder', 'Download Folder Location (relative to assets dir)'), 'Content');
		$fields->addFieldToTab('Root.Content.Main', new TextField('FilePattern', 'Download File Pattern (e.g. OpenRA-{type}{version}.exe)'), 'Content');
		
		return $fields;
	}
	
	function populateDefaults() {
		$this->Folder = 'downloads/' . $this->URLSegment;
	}
}

class DownloadPage_Controller extends Page_Controller {
	static $url_handlers = array(
		'$Type!/$Version!' => 'download'
	);
	
	function init()	{
		parent::init();
	}
	
	function AllDownloads($type = 'release', $sortDesc = false) {
		$downloadFolder = Folder::findOrMake($this->Folder);
		
		if (!$downloadFolder || !$downloadFolder->hasChildren()) {
			return null;
		}
		
		$children = $downloadFolder->Children();
		if ($sortDesc) {
			$children->sort('Name', 'DESC');
		}
		
		$filtered = new DataObjectSet();
		$pattern = '/' . str_replace(array('{type}', '{version}'), array($type, '([\\d\\w\\.-]+)'), $this->FilePattern) . '/';
		foreach ($children as $child) {
			if (preg_match($pattern, $child->Name, $matches)) {
				$filtered->push(new ArrayData(array('file' => $child, 'version' => $matches[1])));
			}
		}
		
		return $filtered;
	}
	
	function LatestDownload($type = 'release') {
		$allDownloads = $this->AllDownloads($type);
		if (!$allDownloads) return null;
		return $allDownloads->Last();
	}
	
	function download($r) {
		$params = $r->allParams();

		$downloadFolder = Folder::findOrMake($this->Folder);

		if (!$downloadFolder || !$downloadFolder->hasChildren()) {
			$this->httpError(404);
			return;
		}
		
		$version = $params['Version'];
		$download_file = null;
		
		if ($version == 'latest') {
			$download_file = $this->LatestDownload($params['Type'])->getField('file');
		}
		else {
			$download_filename = str_replace(array('{type}', '{version}'), array($params['Type'], $version), $this->FilePattern);
			$download_file = $downloadFolder->Children()->find('Name', $download_filename);
		}
		
		if (!$download_file) {
			$this->httpError(404);
			return;
		}
			
		Director::redirect($download_file->getRelativePath());
	}
	
	static function clearLatestDownload() {
		self::$latestDownload = array(
		);
	}
}

?>
