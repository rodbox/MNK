<?php 
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();
$dir = DIR_USER."/0/css-color-generator/";

$d=file::file_list($dir);

asort($d);

foreach ($d as $key => $value) {
	$json[] = str_replace(array("palette-",".json"), "", $value);
}

echo json_encode($json);
 ?>