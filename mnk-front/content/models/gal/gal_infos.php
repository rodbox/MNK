<?php
$p = array(
    "from"=>"mnk_gal",
    "where" =>"gal_Folder='".$send['gal_folder']."'");
$r  = db::reqSlt($p);
$d  = $r->fetchAll();
?>
