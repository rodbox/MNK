<?php 
$configFile = DIR_PACK."/".$send["pack"]."/config/pack-pages.json";
$json =  json_decode(file_get_contents($configFile),true);
// echo $json->{'menu-manager'};


	$d["file"] 		= file::file_list(DIR_PACK."/".$send["pack"]."/pages");
	$d["pack"] 		= $send["pack"];
	$d["config"]	= $json;

?>