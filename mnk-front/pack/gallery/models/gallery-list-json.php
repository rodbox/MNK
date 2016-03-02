<?php
	

require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();

// $list= array("1","2","3");
$list = file::folder_list(DIR_USER_ROOT."/gallery");
// mnk::debug($list);

foreach ($list as $key => $value) {
	

	$json[]= basename($value);
}
// mnk::debug($d);
echo json_encode($json);
?>