<?php 

extract($_POST);
if(isset($fileName)){
	$jsonDir = DIR_USER_ROOT."/rocket-v2/params/";
	$jsonFile = $jsonDir."/".$fileName.".json";


	unset($_POST['fileName']);

	mnk::push_json($jsonFile,$_POST);
}
else{
	header("Location: ".$_SERVER['HTTP_REFERER']);
}
 ?>