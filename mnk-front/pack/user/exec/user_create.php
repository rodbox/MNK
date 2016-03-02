<?php
extract($_POST);

mnk::debug($_POST);
// evaluation du nom d'utilisateur
/*$p = array(
  //  "select"=>"COUNT(user_User), COUNT(user_Mail)",
    "from"  => "mnk_user",
    "where" => 'user_User = "'.$user_crea.'" OR user_Mail = "'.$mail_crea.'"'
    );
$r = db::reqSlt($p);
$d = $r->fetchAll();
$countUser = $d[0][0];
mnk::debug($d);
if($countUser != 0){
    echo json_encode(array(
        "error"=>"Le nom d'utilisateur existe déja."
    ));
}
*/

//if($countUser == 0 ){
    $p      = array(
        "insert_into"   => "mnk_user",
        "value"    => array(
            "user_ID"           =>"",
            "user_User"         =>$user_crea,
            "user_Mail"         =>$mail_crea,
            "user_Pw"           =>md5($pw_crea),
            "user_First"        =>$user_first_crea,
            "user_Last"         =>$user_last_crea,
            "user_Civ"          =>$civ_crea,
            "user_Date_Time_Crea"=>db::dbTime(),
            "user_Power"        =>3,
            "user_Lang"         =>"FR"
        ));

    $id = db::reqAdd($p,"lastInsertId");
    echo json_encode(array(
    "error"=>"",
    "success"=>"Votre compte est créé !"
    ));
//}

?>

