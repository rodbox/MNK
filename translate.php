<?php
require_once('mnk-include/core/mnk-core.php');
new mnk();
mnk::mod_load("html");



// $url = 'http://leconjugueur.lefigaro.fr/conjugaison/verbe/'+$_POST['verbe']+'.html';
$url = 'http://conjugueur.reverso.net/conjugaison-francais-verbe-sortir.html';
$html 	= file_get_html($url);

foreach($html->find('table') as $element) 
       echo $element.'<br>';

// $url ='http://www.xe.com/fr/currencyconverter/convert/?Amount=150&From=EUR&To=USD#converter';
// $html 	= file_get_html($url);

 ?>
<pre><?php print_r($html->find('table')); ?>	</pre>
