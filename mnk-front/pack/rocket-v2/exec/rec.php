<?php 

extract($_GET);
if ($rec!=""){
	$rec = str_replace(" ", "-", $rec);

	$jsonDir = DIR_USER_ROOT."/rocket-v2/rec/";
	$jsonFile = $jsonDir."/".$rec.".json";


	// unset($_POST['file']);

$valStop = "macro stop";
$keyStop = array_search($valStop,$_GET['scene']);
$scene = array_slice($_GET['scene'], 0, $keyStop);

	mnk::push_json($jsonFile,$scene);
}
 ?>