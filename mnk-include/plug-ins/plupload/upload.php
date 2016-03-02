<?php 
move_uploaded_file($_FILES['file']['tmp_name'],'test/'.$_FILES['file']['name']);


?>

FILES ---
<pre><?php print_r($_FILES);?></pre>

REQUEST ---
<pre><?php print_r($_REQUEST);?></pre>

SERVER ---
<pre><?php print_r($_SERVER);?></pre>