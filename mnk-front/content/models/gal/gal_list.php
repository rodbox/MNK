<?php
//$d = file::listDir(DIR_UPLOAD."/gal");


//$d = file::listDir(DIR_UPLOAD."/gal");
$p = array(
    "from"  => "mnk_gal",
    "where" =>"gal_Visible = '1'"
);
$r = db::reqSlt($p);
$d = $r->fetchAll();


?>