<?php 
extract($_POST);
$file 		= file_get_contents(DIR_USER."/0/css-color-generator/palette-".$palette.".json");
$json 		= json_decode($file,true);

$d 			= $json;

echo $file;
// mnk::debug($d);
?>