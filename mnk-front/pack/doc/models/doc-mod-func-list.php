<?php


$dir = CORE . '/mod/mod_'.$_GET["mod"].'.php';
$r = file_get_contents($dir);
$reg = "[((private|public|static|){0,}\s{1,}function\s{1,}[A-Za-z_0-9]{1,}\s{0,}\(([A-Za-z_0-9\$\,\"\=\'\)\s{0,}]{1,}\{))]";
preg_match_all($reg, $r, $r);

$d['func'] = $r[0];

?>