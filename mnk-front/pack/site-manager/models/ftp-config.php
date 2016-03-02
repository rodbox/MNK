<?php 

	// mnk::mod_load("file"); 
	mnk::pack_config("site-manager"); 

	

// 	$json = file_get_contents(SITE_META_FILES."/".$_GET['site']."/sftp-config.json");


// $con = '{
//     "type": "ftp",
//     "save_before_upload": true,
//     "upload_on_save": true,
//     "sync_down_on_open": true,
//     "sync_skip_deletes": false,
//     "confirm_downloads": false,
//     "confirm_sync": true,
//     "confirm_overwrite_newer": false,
//     "host": "FEZA",
//     "user": "GREZ",
//     "password": "FREZ",
//     "remote_path": "/",
//     "ignore_regexes": [
//         "\\.sublime-(project|workspace)", "sftp-config(-alt\\d?)?\\.json",
//         "sftp-settings\\.json", "/venv/", "\\.svn", "\\.hg", "\\.git",
//         "\\.bzr", "_darcs", "CVS", "\\.DS_Store", "Thumbs\\.db", "desktop\\.ini","\\.jpg","\\.JPG","\\.PNG","\\.GIF","\\.png","\\.jpeg","\\.zip","\\.ZIP","\\.sublime-snippet"
//     ],
//     "connect_timeout": 30
// }';




//  $d = json_decode(stripcslashes($json));

// mnk::debug($d);


$xmlFile = SITE_META_FILES."/".$_GET['site']."/filezilla.xml";
$xml = simplexml_load_file($xmlFile);
$d = json_decode( json_encode($xml->Servers->Server) , 1);

?>