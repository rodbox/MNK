<?php 
	session_start();
	extract($_GET);
	$arrayAllow=array("toggle-timer","toggle-helper");

	$eval = in_array($session, $arrayAllow);

	if($eval)$_SESSION[$session] = $value;
	print_r($_SESSION);
?>