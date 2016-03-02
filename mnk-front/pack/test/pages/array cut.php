<?php 
$arr = array(
	'0',
	'1',
	'2',
	'3',
	'4',
	'list5',
	'6',
	'7');

mnk::debug($arr);

$valStop = "1";
$keyStop = array_search($valStop,$arr);


$arr = array_slice($arr, 0, $keyStop);
mnk::debug($arr);

 ?>