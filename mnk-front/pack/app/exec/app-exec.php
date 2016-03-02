<?php 
	require_once('../../../../mnk-include/core/mnk-core.php');
	new mnk();
	$pointer = json_decode($_POST['pointer'],true);
	// unset($_POST['pointer']);
	$data = array();
	foreach ($_POST as $key => $value) {
		$newKey = str_replace($key, $pointer[$key],$key);
		$data[$newKey]= $value;
	}
	unset($_POST);
	$_POST = $data;

	include (DIR_PACK."/".$_GET['pack']."/exec/".$_GET['exec'].".php");
 ?>
