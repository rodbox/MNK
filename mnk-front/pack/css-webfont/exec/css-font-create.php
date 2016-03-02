<?php 

$dirFont = DIR_PACK."/css-webfont/img";
$dirCss = DIR_PACK."/css-webfont/css";
$list = file::listDir($dirFont);


$content= "";

foreach ($list as $key => $value) {
	$file = basename($value);
	$title = str_replace(array('.otf','.ttf'), "", $file);


	$content .= "@font-face { font-family: ".$title."; src: url('../img/".$file."'); }\n";
	# code...
}

file_put_contents($dirCss."/mnk-webfont.css", $content);
 ?>