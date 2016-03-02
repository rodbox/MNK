<?php $port = "";

$pw = "PASSWORD_MAIL";
$user = "USER_MAIL";
 $imap = imap_open("{IMAP_MAIL_SERVER}", $user, $pw) or die("Connexion impossible : " . imap_last_error());

$MC = imap_check($imap);
echo "<ul>";
// Fetch an overview for all messages in INBOX
$result = imap_fetch_overview($imap,"1:{$MC->Nmsgs}",0);
$result = array_reverse($result);
foreach ($result as $key =>$overview) {
    echo "<li>#{$overview->msgno} ({$overview->date}) - {$overview->from}
    {$overview->subject}</li>";

     echo imap_qprint(imap_body($imap, $overview->msgno));
}
echo"</ul>";


 //Check no.of.msgs
     $num = imap_num_msg($imap);

// echo  $num;

//      //if there is a message in your inbox
//      if( $num >0 ) {
//           //read that mail recently arrived
//           echo imap_qprint(imap_body($imap, 10));
//      }

// echo imap_body($imap, 17);
 echo imap_qprint(imap_body($imap, 10));

imap_close($imap);


?>

<pre><?php print_r($result); ?></pre>