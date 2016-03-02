<?php
session_start();
extract($_POST);
   // mnk::debug($_POST);
$p = array(
    'from' => "mnk_user",
    'where' => "user_User = '" . $user_log . "' AND user_Pw ='" . md5($pw_log) . "'");

$r  = new db;
$r  = $r->reqSlt($p);

if ($r->rowCount() == 1) {
    $d = $r->fetch(PDO::FETCH_OBJ);

    $_SESSION['user']['id'] = $d->user_ID;
    $_SESSION['user']['name'] = $d->user_User;
    $_SESSION['user']['power'] = $d->user_Power;

    user::statutUpd($d->user_ID, 2, $d->user_Confirm);
    echo json_encode(array("error"=>""));
    //mnk::iheader("page:home",array("type"=>"classic"));
} else {
    //
    echo json_encode(array("error"=>"identifiant ou mot de passe éronné !"));
}
?>