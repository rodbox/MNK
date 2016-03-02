<?php 
// mnk::debug($_POST);
extract($_POST);
$jsonDir = DIR_USER_ROOT."/rocket-v2/tools/";
$jsonFile = $jsonDir."/".$id.".json";

mnk::push_json($jsonFile,$_POST);



 ?>