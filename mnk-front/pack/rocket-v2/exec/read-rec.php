<?php 
extract($_GET);
	$jsonDir = DIR_USER_ROOT."/rocket-v2/rec/";
	$jsonFile = $jsonDir."/".$rec.".json";

	//$json = mnk::load_json($jsonFile);
	echo file_get_contents($jsonFile);
 ?>