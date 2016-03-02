<?php 
session_start();

$p = array(
    'from' => "mnk_user",
    'where' => "user_User = '" . $_SESSION['user']['name'] . "'");
$r  = new db;
$r  =$r->reqSlt($p);
$d = $r->fetchAll();

$expName	= $_SESSION['user']['name'];
$expMail 	= $d[0]['user_Mail'];
$expSign 	= $d[0]['user_Mail_sign'];



$email		= $_POST["content"];
$email		.= "\n\n\n".$expSign;

$subject	= $_POST["object"];
$to = "";


if(is_array($_POST["contact"])){
	foreach ($_POST["contact"] as $key => $value)
		$to .= $value.",";
	$to = str::sub($to,1);
}
else
	$to .= $_POST["contact"];


$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=utf8";
$headers[] = "From: ".$expName." <".$expMail.">";
$headers[] = "Reply-To: ".$expName." <".$expMail.">";
$headers[] = "Subject: ".ucfirst($subject);
$headers[] = "X-Mailer: PHP/".phpversion();


$mailSend= mail($to, $subject, $email, implode("\r\n", $headers));
?>