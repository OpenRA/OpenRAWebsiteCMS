<?php

class MapRepository_Controller extends Controller {

	public static $allowed_max_file_size = 102400; //100KB
	public static $allowed_max_internal_file_size = 51200; //50KB
	public static $required_map_files = array('map.yaml', 'map.bin');

	function upload($data) {
		//Validate extension and size
		$validator = new Upload_Validator();
		$validator->setAllowedExtensions(array('oramap'));
		$validator->setAllowedMaxFileSize(self::$allowed_max_file_size);
		$vars = $data->postVars();
		$tmp_file = $vars['file'];
		$upload = new Upload();
		$upload->setValidator($validator);
		$valid = $upload->validate($tmp_file);
		if (!$valid) {
			foreach ($upload->getErrors() as $error) {
				print($error . '<br />');
			}
			return;
		}

		//Validate contents

		$zip = new ZipArchive();
		$res = $zip->open($tmp_file['tmp_name']);

		if ($res !== TRUE) {
			print('File is not valid. (Could not open as zip)');
			return;
		}

		$content = '';

		foreach (self::$required_map_files as $f) {
			if ($zip->locateName($f) === FALSE) {
				print('File is not valid. (Could not find required file)');
				$zip->close();
				return;
			}

			$stat = $zip->statName($f);
			if ($stat['size'] > self::$allowed_max_internal_file_size) {
				print('File is not valid. (Internal file too big)');
				$zip->close();
				return;
			}

			$content = $content . $zip->getFromName($f);
		}

		$hash = sha1($content);

		$zip->close();

		$tmp_file['name'] = $hash . '.oramap';

		$folder = Folder::findOrMake('maps');

		if ($folder->hasChildren()) {
			foreach ($folder->children() as $child) {
				if ($child->Name == $tmp_file['name']) {
					print('Map already uploaded.');
					return;
				}
			}
		}

		$folder->addUploadToFolder($tmp_file);
	}
}

?>
