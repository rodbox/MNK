<?php
require_once('mnk-include/core/mnk-core.php');
new mnk();

session_start();

?>

<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>Metronic</title>
        <?php
        mnk::css(array(
            "metro-plugins:bootstrap/css/bootstrap.min",
            "metro-plugins:bootstrap/css/bootstrap-responsive.min",
            "metro-plugins:font-awesome/css/font-awesome.min",
            "metro-plugins:uniform/css/uniform.default",
            "metro:style",
            "metro:themes/default",
            "metro:style-metro",
            "metro:style-responsive",
            "metro-plugins:font-awesome/css/font-awesome.min",
            "theme:color-ui",
            "theme:mnk-ui",
            "theme:style",
            "pack:section/section",
            "theme:login"
        ));
        theme::favicon();
        ?>

    </head>
<body class="login bgi-3 bg-31">
  <img src="http://metronic.excentrik.fr/mnk-front/themes/default/img/rodbox.png" alt="" class="logo" style="" />
 
<?php //theme::simg("bg-green-blur",array("class"=>"bg-full")); ?>

  <div class="content">
   
    <!-- BEGIN LOGIN FORM -->
    <?php form::iform("pack-exec:user/user_eval_connect","POST","",array("class"=>"form-vertical login-form")); ?>
<!-- <h3 class="">Connexion</h3> -->
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>Saisissez votre nom d'utilisateur ainsi que votre mot de passe.</span>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Nom d'utilisateur</label>
        <div class="controls">
          <div class="input-icon left">
            
            <?php form::textIco("user_log req","user","Nom d'utilisateur"); ?>
            
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
        <div class="controls">
          <div class="input-icon left">
            <?php form::pwIco("pw_log req","key","Mot de passe"); ?>
          
<br>
          <a href="javascript:;" class="small" id="forget-password">Mot de passe oublier ?</a>
          </div>
        </div>
      </div>
      <div class="form-actions">
       <!--  <label class="checkbox">
        <input type="checkbox" name="remember" value="1"/> Remember me
        </label> -->
       <a href="javascript:;" id="register-btn" class="btn">Créer un compte</a>
         <button type="submit" class="btn pull-right green">
        Connexion 
        </button>            
      </div>
     <!--  <div class="forget-password">
        <h4>Mot de passe oublier ?</h4>
        <p>
          pas de problème <a href="javascript:;" class="" id="forget-password">cliquez içi</a>
          pour redéfinir un nouveau mot de passe.
        </p>
      </div> -->
    
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="form-vertical forget-form" action="index.html">
      <h3 class="">Mot de passe oublier ?</h3>
      <p>Entrer votre e-mail pour réinitialiser votre mot de passe.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-icon left">
            <?php form::textIco("email req","mail","Email"); ?>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
        <i class="m-icon-swapleft"></i> Retour
        </button>
        <button type="submit" class="btn green pull-right">
        Envoyer <!-- <i class="m-icon-swapright m-icon-white"></i> -->
        </button>            
      </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

           <?php form::iform("pack-exec:user/user_create","POST","",array("class"=>"form-vertical register-form")); ?>
      <h3 class="">Créer un compte</h3>
      <p>Saisir les informations</p>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Nom d'utilisateur</label>
        <div class="controls">
          <div class="input-icon left">
 
            <?php form::textIco("user_crea req","user","Nom d'utilisateur"); ?>
            
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
        <div class="controls">
          <div class="input-icon left">


  <input type="password" name="pw_crea" value="" class="input-ico placeholder-no-fix required" style="background-image: url(http://static.excentrik.fr/img/ui/Ultimate/Icons/SVG/key.svg);" placeholder="Mot de passe" id="register_password"/>

            <?php //form::pwIco("pw_crea req","key","Mot de passe","",array("id"=>"register_password")); ?>
           
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Resaisir votre mot de passe</label>
        <div class="controls">
          <div class="input-icon left">
            <!-- <i class="icon-ok"></i> -->
            <?php form::pwIco("rpw_crea req","key","Resaisir votre mot de passe"); ?>
           
          </div>
        </div>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="controls">
          <div class="input-icon left">
            <!-- <i class="icon-envelope"></i> -->
            <?php form::textIco("mail_crea req","mail","Email"); ?>
           
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
          <input type="checkbox" name="tnc"/> J'accepte les <a href="#">Conditions d'utilisation</a> et <a href="#">Politique de confidentialité</a>.
          </label>  
          <div id="register_tnc_error"></div>
        </div>
      </div>
      <div class="form-actions">
        <button id="register-back-btn" type="button" class="btn">
        <i class="m-icon-swapleft"></i>  Retour
        </button>
        <button type="submit" id="register-submit-btn" class="btn green pull-right">
        créer <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
    </form>
    <!-- END REGISTRATION FORM -->
  </div>
  <?php 
mnk::js(
    array(
    "core:jquery",
    "core:jquery.mnk-modal",
    // "core:jquery.mnk-modalview",
    "plugins:plupload/js/plupload",
    "plugins:plupload/js/plupload.html5",
    "plugins:plupload/js/plupload.flash",
    "metro-plugins:bootstrap/js/bootstrap.min",
    "metro-plugins:breakpoints/breakpoints",
    "metro-plugins:jquery-slimscroll/jquery.slimscroll.min",
    "metro-plugins:jquery.blockui.js",
    "metro-plugins:jquery.cookie",
    "metro-plugins:uniform/jquery.uniform.min",
    "metro-plugins:jquery-validation/dist/jquery.validate.min",
    "metro:app",
    "pack:user/login",
    "pack:user/user"
      //  "pack:gal/plupload.main"
        //"plugins:fullsizable/jquery.fullsizable",
        //"plugins:fullsizable/jquery.fullsizable",

    )
    );
?>

<script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();

      Login.init();
      });
   </script>
</body>
</html>