<?php 
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();
$d = file::folder_list(DIR_PACK);
foreach($d as $key=> $val){
	$list[]= basename($val);
}




	echo json_encode($list);
?>