<h1>Paramètres</h1>
<hr>
<?php 

foreach ($d as $key => $value) {
	$opt[WEB_PACK."/rocket-v2/img/".$value]=$value;
}


form::select("bg-svg",$opt);
 ?>