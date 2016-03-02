<?php
$p  =array(
    "select"=>"
    user.user_ID,user.user_First,user.user_Last,user.user_Civ,user.user_User,
    lnk.user_ID_1, lnk.user_ID_2

    ",
    "from"=>"mnk_user_contact as lnk INNER JOIN mnk_user as user",
        "where"=>"(lnk.user_ID_1 = '".$_SESSION["user"]["id"]."' OR lnk.user_ID_2 = '".$_SESSION["user"]["id"]."') ".
                 " AND (lnk.user_ID_1=user.user_ID OR lnk.user_ID_2 = user.user_ID)".
                 " AND (user.user_ID != '".$_SESSION["user"]["id"]."')"
    );

$r=db::reqSlt($p);
$d=$r->fetchAll();
?>
