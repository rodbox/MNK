<?php 
	$d = file::folder_list(DIR_PACK);
	$dir = DIR_USER."/0/rocket/scan-pack.json";


foreach ($d as $key => $value) {
	$forJson[] = basename($value);
}

	$json = json_encode($forJson);
	file_put_contents($dir, $json);
	mnk::debug($json);
?>