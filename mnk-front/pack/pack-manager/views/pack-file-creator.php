<?php 

	form::iform("pack-exec:pack-manager/pack-file-creator #filecreator","POST");

	form::text("fileName","","",array("style"=>"width:200px;"));
echo " ";
	$optPackList[] = "";
	foreach ($d as $key => $value) {
		$optPackList[basename($value)] = basename($value);
	}

	form::select("pack",$optPackList,"",$_GET['pack'],array("style"=>"width:120px;"));
echo " ";

	$opt = array(
		"exec" 		=> "exec",
		"js" 		=> "js",
		"jquery-plugin" 		=> "jquery-plugin",
		"models" 	=> "models",
		"pages" 	=> "pages",
		"demo" 		=> "demo",
		"img" 		=> "img",
		"css" 		=> "css",
		"views" 	=> "views",
		"config" 	=> "config",
		"svg-ui" 	=> "svg-ui"
		);
	form::select("type",$opt,"","",array("style"=>"width:80px;"));
echo " ";
	form::submit("Créer","Créer",array('class' => "btn green plus"));

	form::formOut();
mnk::iview("pack:pack-manager/pack-file-uploader");
 ?>