<?php 
	extract($_POST);

	$srcType = array(
		"css"		=>"css",
		"exec"		=>"php",
		"js"		=>"js",
		"views"		=>"php",
		"models"	=>"php",
		"demo"		=>"php",
		"img"		=>"null",
		"config"	=>"json"
	);// $template = DIR_TEMPLATE."/files/".$srcFile[$type];

	$dest = DIR_THEME_LIST . '/' . $theme . '/'.$type;
	//mnk::debug($_POST);

	file::templateFile($srcType[$type],$dest,$fileName);
?>