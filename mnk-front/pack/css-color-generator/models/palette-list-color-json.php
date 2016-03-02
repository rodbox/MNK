<?php 
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
// mnk::debug($_POST);
extract($_POST["param"]);
$color = (isset($e14))?$e14:$_POST["param"][1];
session_start();
$colorList = mnk::load_json(DIR_USER."/0/css-color-generator/palette-".$color.".json",true);
// mnk::debug($colorList);
// $dir = DIR_USER."/0/css-color-generator/";

// $d=file::file_list($dir);

// asort($d);

// foreach ($d as $key => $value) {
// 	$json[] = str_replace(array("palette-",".json"), "", $value);
// }

echo json_encode($colorList["palette"]["key"]);
 ?>