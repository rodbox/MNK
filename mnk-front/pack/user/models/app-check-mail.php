<?php $port = "";

$pw = "x2BaKx;=";
$user = "rodolphe@rodbox.fr";
$server = "{imap.1and1.fr:143/imap}";
 $imap = imap_open($server, $user, $pw) or die("Connexion impossible : " . imap_last_error());

$MC = imap_check($imap);

// Fetch an overview for all messages in INBOX
$result = imap_fetch_overview($imap,"1:{$MC->Nmsgs}",0);
$result = array_reverse($result);
$i =0;
foreach ($result as $key =>$overview){
    $list[$i] = "<span class='maxi-meta'><strong>".$overview->from."</strong></span><span class='small mini-meta alpha_4'>".date("d/m/Y G:i",strtotime($overview->date)) ."</span>";
    $list[$i] .= "<input type='hidden' value='".$overview->msgno."' class='msg-num' />";
    $list[$i] .= "<p class='alpha_4 margin-5'>".$overview->subject."</p>";
    // $list[$i] .= "<hr class='alpha_1'/>";
    $i++;
}
imap_close($imap);




echo json_encode($list);
?>