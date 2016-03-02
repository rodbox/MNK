<?php 
	

require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();
$d = file::file_list(CORE."/mod");
	asort($d);

foreach ($d as $key => $value) {
	$json[] = str_replace(array("mod_",".php"), "", $value);
}

echo json_encode($json);
 ?>