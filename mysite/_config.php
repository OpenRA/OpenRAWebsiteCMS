<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'SQLiteDatabase',
	"server" => '',
	"username" => '',
	"password" => '',
	"database" => 'SS_OpenRA',
	"path" => '/srv/http/assets/openra.db',
);

MySQLDatabase::set_connection_charset('utf8');

// This line set's the current theme. More themes can be
// downloaded from http://www.silverstripe.org/themes/
SSViewer::set_theme('blackcandy');

// Set the site locale
i18n::set_locale('en_NZ');

// enable nested URLs for this site (e.g. page/sub-page/)
SiteTree::enable_nested_urls();