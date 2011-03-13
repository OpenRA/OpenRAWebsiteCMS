<?php

class MapRepository_Controller extends Controller {

	public static $allowed_max_file_size = 102400; //100KB

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
			print('File is not valid.');
			return;
		}

		if ($zip->locateName('map.yaml') === FALSE || 
			$zip->locateName('map.bin') === FALSE) {
			print('File is not valid. (Does not contain appropriate files)');
			$zip->close();
			return;
		}

		$zip->close();

		$folder = Folder::findOrMake('maps');

		$folder->addUploadToFolder($tmp_file);
	}
}

?>
