<?php mnk::iview("pack:user/mail-menu","",array("num"=>$num)); ?>
<?php 
extract($_POST);
$port = "";

$pw = "x2BaKx;=";
$user = "rodolphe@rodbox.fr";
 $imap = imap_open("{imap.1and1.fr:143/imap}", $user, $pw) or die("Connexion impossible : " . imap_last_error());
 $msgStruc = imap_fetchstructure($imap, $num);
 $encoding = $msgStruc->encoding;
 $subtype = $msgStruc->subtype;
if($encoding ==3)
	echo str_replace("\n","<br>",imap_base64(imap_body($imap, $num)));
else if($encoding == 0)
	echo str_replace("\n","<br>",imap_body($imap, $num));
else
	echo imap_body($imap, $num);



imap_close($imap);

?>

<pre><?php print_r($msgStruc) ?></pre>
