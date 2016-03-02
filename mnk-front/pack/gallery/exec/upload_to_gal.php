<?php 
	session_start();
	// mnk::debug($_POST);
//mnk::debug($_SESSION);
	$dirDest = DIR_USER_ROOT."/gallery/".$_POST["gallery"]."/tmp";


	// //print_r($_FILES);
	$source = $_FILES['file']['tmp_name'];
	$dest = $dirDest . "/".$_FILES['file']['name'];

    move_uploaded_file($source, $dest);

   //mnk::iinc("pack:gal/exec/tmp_thumb_loop",array("tmp"=>$dest));

 ?>