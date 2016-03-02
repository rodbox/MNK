<?php

$Name 		= "Webmaster"; //senders name
$emailFrom 		= "contact@excentrik.fr"; //senders e-mail adress
$email_adress 	= "jacquemin.rodolphe@hotmail.fr"; //recipient
$mail_body 	= "un random link 1234564dze5a"; //mail body
$subject 	= "Redefinition de mot de passe"; //subject

// mail($recipient, $subject, $mail_body, $header); //mail command :)

//Newletter format HTML
$message=include("lanews.php");
$message="toto";
// Pour envoyer un mail HTML, l\'en-tête Content-type doit être défini
$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
            
// En-têtes additionnels
$headers  .= "From: ". $Name . " <" . $emailFrom . ">\r\n"; //optional headerfields  # IMPORTANT l\'adresse spécifiée ici est sur le domaine SMTP qui Envoie
            
mail($email_adress,$subject,$mail_body,$headers) OR die('Message');
mnk::iheader("pack-page:user/redefine");
?>