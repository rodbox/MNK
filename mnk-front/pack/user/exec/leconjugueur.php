<h1><?php echo $_POST['verbe']; ?></h1>
<?php 
mnk::mod_load("html");


// $url = 'http://leconjugueur.lefigaro.fr/conjugaison/verbe/'+$_POST['verbe']+'.html';
$url = 'http://www.conjugaison.com/verbe/dormir.html';
$html 	= file_get_html($url);


$table = $html->find("table");

// $url ='http://www.xe.com/fr/currencyconverter/convert/?Amount=150&From=EUR&To=USD#converter';
// $html 	= file_get_html($url);
echo $table;
 ?>
<pre><?php print_r($table); ?></pre>

