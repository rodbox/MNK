<?php 
// require_once('mnk-include/core/mnk-core.php');
// 	new mnk();
	session_start(); 

$param = explode ('/',$_SERVER['REQUEST_URI']); 



// mnk::debug($param);

// $_GET['title_project']=$param[1];
// require("index-user.php"); 


$_GET["project"]=$param[1];
$_GET["func"]=$param[2];


unset($param[0]);
unset($param[1]);
unset($param[2]);

require("app.php"); 




 ?>