
<?php 
form::iform("pack-exec:pack-manager/pack-zip #pack-zip");



$optPackList[] = "";
foreach ($d as $key => $value) {
	$optPackList[basename($value)] = basename($value);
}

form::select("pack",$optPackList); ?>
<?php form::submit("Zip","Zip");?>
<?php form::formOut();?>
<div id="zip-link"></div>