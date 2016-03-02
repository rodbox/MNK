<?php $port = "";

$pw = "x2BaKx;=";
$user = "rodolphe@rodbox.fr";
 $imap = imap_open("{imap.1and1.fr:143/imap}", $user, $pw) or die("Connexion impossible : " . imap_last_error());

$MC = imap_check($imap);

// Fetch an overview for all messages in INBOX
$result = imap_fetch_overview($imap,"1:{$MC->Nmsgs}",0);
$result = array_reverse($result);
$i =0;
foreach ($result as $key =>$overview){
    $list[$i] = "<span class='maxi-meta'><strong>".$overview->from."</strong></span><span class='small mini-meta'>".date("d/m/Y G:i",strtotime($overview->date)) ."</span>";
    $list[$i] .= "<input type='hidden' value='".$overview->msgno."' class='msg-num' />";
    $list[$i] .= "<p>".$overview->subject."</p>";
    $i++;
}
imap_close($imap);




echo json_encode($list);
?>