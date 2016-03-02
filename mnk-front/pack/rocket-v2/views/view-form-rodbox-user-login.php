<div class="grid_4 out align-right z-overlay-5 top">
    <div class="ingrid">
        <?php 
        $bt = '<button class="toRemove " style="'.ui::rbg("plus-green-light",16).'">Créer un compte</button>';
        appLink("rodbox","e3",$bt);  ?>
    
    </div>
</div>
<div class="top_4 push_1 grid_6 toRemove">

		<h1 class="intro toRemove">Bonjour</h1>
		<h2 class="intro toRemove">Bienvenue sur Rodbox.fr</h2>
<?php $form = new form("loggin");?>
<?php $form->exec("user","user-forget");?>

		<div class="padding-top-35 padding-bottom-35">
			<input type="text" name="user-name-log" id="user-name-log" autocapitalize="off" help="Votre notre d'utilisateur" required placeholder="Nom d'utilisateur" class="bg-2 w-100 input-ico box-size margin-bottom-15 bg-user"><br>
			<input type="password" name="user-pw-log" id="user-pw-log" placeholder="Mot de passe" help="Votre mot de passe" required class="bg-2 w-100 input-ico box-size bg-pw"><br>
			<div class="padding-5">
				<input type="checkbox" name="remember-me" id="remember-me" autocomplete="off" /><label for="remember-me" class="c-1 padding-left-5">Maintenir la connexion</label>
			</div>
		</div>
         <?php 
        $bt = '<button class="no-border no-shadow bg-transparent">Mot de passe oublié</button>';
        appLink("rodbox","e5",$bt,"small c-2 f-left no-decoration");  ?>
		<input type="submit" class="f-right "  value="Se connecter">
<?php $form->end();?>
</div>