<?php $form= new form("forget")?>
<div class="top_1 push_1 grid_12 toRemove">
    <div class="">
        <h1 class="intro toRemove">Un problème ?</h1>
        <h2 class="intro toRemove">Redéfinissez votre mot de passe</h2>
    </div>
    <div class="user-create">
    <?php $form->exec("user","user-forget");?>
    <div class="padding-top-35 padding-bottom-35">
<input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="user_forget_mail" class="inline-block" id="" placeholder="Votre mail"   />
</div>
<input type="submit" class=" inline-block"  value="Envoyer">
<?php $form->end();?>
</div></div>