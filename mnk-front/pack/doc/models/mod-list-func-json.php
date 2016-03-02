<?php
	

require_once('../../../../mnk-include/core/mnk-core.php');
new mnk();
session_start();

$dir = CORE . '/mod/mod_'.$_POST["param"][1].'.php';
$r = file_get_contents($dir);
$reg = "[((private|public|static|){0,}\s{1,}function\s{1,}[A-Za-z_0-9]{1,}\s{0,}\(([A-Za-z_0-9\$\,\"\=\'\)\s{0,}]{1,}\{))]";
preg_match_all($reg, $r, $r);

$d['func'] = $r[0];
$i = 0;
foreach ($d['func'] as $key => $value) {
	$func = explode("(",str_replace(array("function ","{",")"),"",$value));

	$list[$i]= "<strong>".$func[0]."</strong>  <span class='small'>".$func[1]."</span>";
	$i++;
}
// mnk::debug($d);
echo json_encode($list);
?>