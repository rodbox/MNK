<?php form::iform("pack-exec:user/user_create #user_create"); ?>
<fieldset>
    <?php form::text("user_crea req", "Nom d'utilisateur"); ?><br />
    <?php form::text("mail_crea req", "Mail"); ?><br />
    <?php form::pw("pw_crea req", "Mot de passe"); ?><br />
    <?php form::pw("pw_2_crea req", "Ressaisissez votre mot de passe"); ?><br />
</fieldset>
<fieldset>
    <?php form::radio("civ_crea", array("Mme." => "Mme.", "M." => "M."), "Civilité"); ?><br />
    <?php form::text("user_first_crea", "Prénom"); ?><br />
    <?php form::text("user_last_crea", "Nom de famille"); ?><br /><hr />
    <?php form::submit("inscription_crea", "Inscription", array("class" => "green big")); ?><br />
</fieldset>
<?php form::formOut(); ?>