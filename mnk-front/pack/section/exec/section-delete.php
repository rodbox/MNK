<?php 

$dir = DIR_USER."/0/section/".$_POST["title_project"].".json";
// echo $_POST["title_project"];
unlink($dir);

 ?>