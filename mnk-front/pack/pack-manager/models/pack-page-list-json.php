<?php 
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
extract($_POST["param"]);
// mnk::debug($_POST);
$pack = (isset($e11))?$e11:$_POST["param"][1];


session_start();
$d = file::file_list(DIR_PACK."/".$pack."/pages");
foreach($d as $key=> $val){
	$list[]= str_replace(".php","",basename($val));
}




	echo json_encode($list);
?>