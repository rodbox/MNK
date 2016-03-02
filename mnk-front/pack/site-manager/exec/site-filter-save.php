<?php 

extract($_POST);
mnk::pack_config("site-manager");

$d["file"] = $_POST;
$d["update"] = date("Y-m-d H:i:s");
$json = json_encode($d);

file_put_contents(SITE_META_FILES."/".$site."/".$site."-filter.json",$json);


?>