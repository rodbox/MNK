<?php 

	$jsonRocket = "save";

	//$d = file::folder_list(DIR_PACK);
	$dir = DIR_USER."/0/rocket/rocket-param-".$jsonRocket.".json";


$d = file::folder_list(dirname(DIR_ROOT));

// $dirCore = CORE . '/mnk-core.php';
// $r = file_get_contents($dirCore);
// $reg = "[((private|public|static|){0,}\s{1,}function\s{1,}[A-Za-z_0-9]{1,}\s{0,}\(([A-Za-z_0-9\$\,\"\=\'\)\s{0,}]{1,}\{))]";
// preg_match_all($reg, $r, $r);

// $d = $r[0];

foreach ($d as $key => $value) {
	//$value = str_replace(array("function","{"," ","\n"), "", $value);

	echo $basename = basename($value)."<br>";
	$forJson[] = $basename;
}
// mnk::debug($forJson);
	$json = json_encode($forJson);
	file_put_contents($dir, $json);
	

?>