<?php $form         = new form("user-create"); ?>
<div class="top_1 push_1 grid_8 toRemove">
    <div class="">
        <h1 class="intro toRemove">Bienvenue</h1>
        <h2 class="intro toRemove">Créer un compte rodbox</h2>
    </div>
    <div class="user-create">

    <?php $form->exec("user","user-create");?>
<div class="padding-top-35 padding-bottom-35">
<input type="text" name="user_crea" class="bg-2 w-100 input-ico box-size margin-bottom-15 " style="<?php ui::bg("user-rodbox","24");?>" id="" placeholder="Nom d'utilisateur" help="Choisissez votre nom de l'utilisateur." required autocomplete="off" />
<input type="password" name="pw_crea" class="bg-2 w-100 input-ico box-size margin-bottom-15 " style="<?php ui::bg("key-rodbox","24");?>" id="" placeholder="Mot de passe" help="Définissez un mot de passe de plus de 6 caractères." required autocomplete="off" />


<input type="text" name="user_first_crea" class="bg-2 input-ico box-size margin-bottom-15 inline f-left" style="width:48%; margin-right:4%; <?php ui::bg("users4-rodbox","24");?>" id="" placeholder="Prénom" help="Indiquez votre prénom." required autocomplete="off"/>
<input type="text" name="user_last_crea" class="bg-2 input-ico box-size margin-bottom-15 inline f-left" style="width:48%; <?php ui::bg("users4-rodbox","24");?>" id="" placeholder="Nom" help="Indiquez votre nom de famille." required autocomplete="off" />
<input type="email" name="mail_crea" class="bg-2 w-100 input-ico box-size margin-bottom-15 " style="<?php ui::bg("mail-rodbox","24");?>" id=""  placeholder="Votre mail" help="Saisir votre adresse email." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autocomplete="off" />
<input type="radio" name="civ_crea" id="civ-female" value="Mme." class="inline-table" /><label for="civ-female" class="strong inline c-1">Femme</label>
<input type="radio" name="civ_crea" id="civ-male" value="M." class="inline-table"  /><label for="civ-male" class="strong inline c-1">Homme</label>
<div class="margin-top-10 margin-bottom-20  c-1"><input type="checkbox" name="tnc" id="tnc" required/><label for="tnc" class="checkbox ">J'accepte les <a href="#" class="app-modal-link c-1 strong">Conditions d'utilisation</a> et <a href="#" class="app-modal-link c-1 strong">Politique de confidentialité</a>.
</label></div><input type="submit" value="Inscription"/>
    <?php $form->end();?></div></div>
 </div>