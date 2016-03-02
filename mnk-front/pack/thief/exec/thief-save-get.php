<?php
extract($_POST);
/*

	1. FAIRE UNE PAGINATION 
	2. TEMPORISER LES REQUETES
	3. CONVERTIR LE FICHIER .json EN .xlsx

*/

mnk::mod_load("html");
$dir 		= "http://www.lanouvellerepublique.fr/extension/pages/modules/extapp.php?cod=TOP_ENT_DETAILzzzziddetail|";
$byStep 	= 30;

$max = ceil(($last-$first)/$byStep);


for ($z=0; $z <= $max; $z++) { 



// premier identifiant de la requete
// $first 		= 814;
// dernier identifiant de la requete
// $last 		= 1351;

// nombre de requete par boucle
// numéro de la boucle
$curStep 	= $z;


$byStepFirst = $first+($curStep*$byStep);
$byStepLast = (($byStepFirst+($curStep*$byStep))>$last)?$last:($byStepFirst+$byStep);

$ext 		= ".json";
$fileName 	= "lanr-".$title."-".$z.$ext;
$jsonFile 	= DIR_USER."/0/thief/".$fileName;

$x 			= 0;

for($i=$byStepFirst;$i<=$byStepLast;$i++){

	$url 	= $dir.$i;
	$html 	= file_get_html($url);

	$d[$x] 	= array(
		"Rang Année" 			=> $html->find('tr',1)->find('td',2)->plaintext,
		"Raison Sociale" 		=> $html->find('tr',4)->find('td',2)->plaintext,
		"Effectifs (moyen)" 	=> $html->find('tr',13)->find('td',2)->plaintext,
		"Ville" 				=> $html->find('tr',7)->find('td',2)->plaintext,
		"Activité principale" 	=> $html->find('tr',9)->find('td',2)->plaintext,
		"Adresse" 				=> $html->find('tr',5)->find('td',2)->plaintext,
		"Adresse 2" 			=> $html->find('tr',6)->find('td',2)->plaintext,
		"Dirigeant" 			=> $html->find('tr',12)->find('td',2)->plaintext,
		"Téléphone" 			=> $html->find('tr',10)->find('td',2)->plaintext
	);

	$x++;

	sleep(0.5);
}

$json 	= json_encode($d);
file_put_contents($jsonFile, $json);
}
?>