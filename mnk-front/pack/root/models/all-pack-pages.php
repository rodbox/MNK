<?php 

$packList = file::listDir(DIR_PACK);

foreach ($packList as $key => $value) {
	if(is_dir($value)){

		//mkdir(DIR_PACK."/".$pack."/config");
		//file::templateFile("json",DIR_PACK."/".$pack."/config","pack-pages");

		$pack 			= basename($value);
		$dirPackPages 	= DIR_PACK."/".$pack."/pages";
		$packPagesList 	= file::listDir($dirPackPages);
		foreach ($packPagesList as $keyPage => $valuePage) {
			$file 		= pathinfo($valuePage);
			$pageFile 	= $file['filename'];
			$d[$pack][]	= $pageFile;
		}
		// foreach ($packList as $key => $value) {
		// $d[][]	= array(
		// 	"pos"	=> "0",
		// 	"pack"	=> basename($value),
		// 	"page"	=> "root-index",
		// 	"title"	=> basename($value),
		// 	"folder"=> false

		// 	);
		// }
		//$d[basename($value)] = file::listDir($value."/pages");

	}

}


 ?>