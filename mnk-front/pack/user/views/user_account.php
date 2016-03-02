<?php
form::iform("pack-exec:user/user_account_upd");
?>
<ul>
    <li><?php user::img($_SESSION['user']['id'], $_SESSION['user']['name']); ?><p><?php echo $d[0]['user_User']; ?></p></li>
    <li><div class="mail"><?php echo $d['0']['user_Mail'];?></div></li>
    <li><?php form::pw("pw", "Changer votre mot de passe"); ?></li>
    <li><?php mnk::ilink("page:user_profile", "Changer votre avatar") ?></li>

</ul>

<br />

    
<?php form::submit("save", "enregistrer"); ?>
<?php
form::formOut();
?>
