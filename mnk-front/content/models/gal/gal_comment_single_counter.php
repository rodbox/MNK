<?php
extract($send);

$p = array(
    "from"      => "mnk_gal_com",
    "where"     => "com_Gal_Name ='".$gal_name."' AND com_Gal_File ='".$img."'"
        );
$r = db::reqSlt($p);
$d = $r->fetchAll();

?>
