<?php 
extract($_POST);

	$jsonDir = DIR_USER_ROOT."/rocket-v2/files/";
	$jsonFile = $jsonDir."/".$title.".json";

	mnk::push_json($jsonFile,$_POST);

 ?>