<?php 
$newDir = DIR_USER_ROOT."/gallery/".$_POST["gallery"]."/tmp";
$info = file::file_list($newDir);
mnk::debug($info);

 ?>