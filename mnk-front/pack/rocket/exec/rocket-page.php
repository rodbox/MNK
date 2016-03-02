<?php 
	$d = file::folder_list(DIR_PACK);
	$dir = DIR_USER."/0/rocket/scan-pack-pages.json";


foreach ($d as $key => $value) {
	$pack = basename($value);
	$packPage = file::file_list(DIR_PACK."/".$pack."/pages");

	$pagesList = array();
	foreach ($packPage as $keyPage => $valuePage) {
		$pagesList[] = str_replace(".php", "", $valuePage);
	}

	$forJson[] = array(
		"pack"=> $pack,
		"pages" => $pagesList
		);

}

	$json = json_encode($forJson);
	file_put_contents($dir, $json);

?>