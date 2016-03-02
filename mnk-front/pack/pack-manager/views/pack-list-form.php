<?php 
$optPackList[] = "";
foreach ($d as $key => $value) {
	$optPackList[basename($value)] = basename($value);
}

form::select("pack",$optPackList); ?>