<?php mnk::mod_load("html"); 

// Create DOM from URL or file
$html = file_get_html(WEB_USER."/0/favoris_25-11-13.html");

// Find all images 
foreach($html->find('img') as $element) 
       echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';
// mnk::debug($html);
?>