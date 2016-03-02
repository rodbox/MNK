<?php
$p = array("insert_into"=>"mnk_user_contact",
        "value"=>array(
           "user_ID_1"=>$_SESSION["user"]["id"],
            "user_ID_2"=>$_GET["id"]
        ));
db::reqAdd($p);
?>
