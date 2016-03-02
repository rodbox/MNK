<?php 
require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();
$d = file::folder_list(dirname(DIR_ROOT));
	asort($d);

foreach ($d as $key => $value) {
	$json[] = basename($value);
}

echo json_encode($json);
 ?>