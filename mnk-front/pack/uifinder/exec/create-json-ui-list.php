<?php 

$fileList = DIR_UI."/242424/64px";
$d = file::listDir($fileList);


$list ['folder'] = WEB_UI."/242424/64px";
foreach ($d as $key => $value) {
	$infos = pathinfo($value);
$list ['file'][] = $infos['filename'];
}
$json = json_encode($list);
file_put_contents(DIR_PACK."/uifinder/config/ui-list.json",$json);
 ?>