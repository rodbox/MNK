<div class="span6">
<?php 
theme::portletLightIn("midnight");
form::iform("pack:user/user_pw_redefine");

form::pw("user_pw_1","nouveau mot de passe");
form::pw("user_pw_2","resaisir le nouveau mot de passe");

echo "<hr>";

form::submit("envoyer","envoyer");

form::formOut();
metro::portletOut();
 ?></div>