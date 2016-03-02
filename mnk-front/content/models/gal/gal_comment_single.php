<?php
extract($_GET);

$p = array(
    "from"      => "mnk_gal_com",
    "where"     => "com_Gal_Name ='".$gal_name."' AND com_Gal_File ='".$img."'",
    "order"     => "com_Date DESC"
        );
$r = db::reqSlt($p);
$d = $r->fetchAll();

?>
