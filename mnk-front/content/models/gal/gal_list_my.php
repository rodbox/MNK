<?php
//$d = file::listDir(DIR_UPLOAD."/gal");
$p = array(
    "from"  => "mnk_gal",
    "where" => "user_ID = '".$_SESSION['user']['id']."'" 
);
$r = db::reqSlt($p);
$d = $r->fetchAll();
?>