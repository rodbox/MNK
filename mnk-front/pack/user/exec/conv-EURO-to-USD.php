<?php 
mnk::mod_load("html");
$url ='http://www.xe.com/fr/currencyconverter/convert/?Amount='.$_POST['num'].'&From='.$_POST['from'].'&To='.$_POST['to'].'#converter';
$html 	= file_get_html($url);
$resultFrom = $html->find(".ucc-result-table .leftCol",0);
$resultTo = $html->find(".ucc-result-table .rightCol",0)->plaintext;

$resultUnit_1= $html->find(".ucc-result-table .uccResUnit .leftCol",0)->plaintext;
$resultUnit_2= $html->find(".ucc-result-table .uccResUnit .rightCol",0)->plaintext;

 ?>
<strong><?php echo $resultFrom ?></strong>
=>
<strong><?php echo $resultTo ?></strong>
 <hr>
 <ul>
 	<li><span classs='small'><?php echo $resultUnit_1; ?></span></li>
 	<li><span classs='small'><?php echo $resultUnit_2; ?></span></li>
 </ul>