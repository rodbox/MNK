<?php
extract($_POST);
/*

	1. FAIRE UNE PAGINATION 
	2. TEMPORISER LES REQUETES
	3. CONVERTIR LE FICHIER .json EN .xlsx

*/

mnk::mod_load("html");

// $dir 		= "http://www.societe.com/cgi-bin/mainsrch?champ=".$siret."&imageField2.x=0&imageField2.y=0";
$dir 		= "http://www.societe.com/societe/compagnie-generale-de-construction-electronique-cgce-349207142.html";
$content 	= file_get_contents($dir);




$patterns = array();
$patterns[0] = '[<script(.+)</script>]';
$patterns[1] = '#<head.*</head>#is';
$patterns[2] = '#<script(.*)</script>#U';
$patterns[3] = '#<\?xml .*<body>#is';
$patterns[4] = '#</body>#is';
$patterns[5] = '#</html>#is';
// $patterns[1] = '/</table>/iU';

$replacements = array('','','','','','','','','','','','','','','');

// $replacements[1] = 'fin';
echo preg_replace($patterns, $replacements, $content);
// echo $content;
// $doc = new DOMDocument();
// $doc->loadHTML($content);

// // $idList = array()
// $synthese = "synthese";
// // echo $doc->saveHTML();
// mnk::debug($doc->getElementById('synthese')->nodeValue);


?>