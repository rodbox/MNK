    <link rel="stylesheet" href="http://metronic.excentrik.fr/mnk-front/pack/app/css/dark-theme.css"/>
    <center><img src="http://metronic.excentrik.fr/mnk-front/pack/app/img/Icon-120.png" id="logo"/></center>
    <input type="text" name="user_log" id="" class="req" placeholder="Nom d'utilisateur" 
help="Nom d'utilisateur" autofocus required autocorrect="off" autocapitalize="off" />
    <input type="password" name="pw_log" id="" class="req" placeholder="Mot de passe" 
help="Mot de passe" required/>
    <br>
    <?php appLink("user","e5","Mot de passe oubliés");?> - 
    <?php appLink("user","e3","Créer un compte");?>
