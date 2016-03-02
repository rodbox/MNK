<div class="line_1">
    <div class="grid_3 logo_zone"><?php theme::simg("betty_logo_mini.png", array("class" => "logo_mini","alt"=>"")); ?></div>
    <div class="grid_12 menu"><ul>
            <li><?php mnk::linkPage("news", "", "News"); ?></li>
            <li><?php mnk::linkPage("home", "", "Les galleries"); ?></li>
            <?php if (user::user_statut()): ?>
                <li><?php mnk::linkPage("messagerie", "", "Messages"); ?></li>
                <li><?php mnk::linkPage("contact", "", "Contact"); ?></li>
             <?php endif; ?>
        </ul></div>
    
</div>
<div class="line_2 both">
     <?php if (user::user_statut()): ?>

        <div class="grid_15 sub_menu">
            <?php theme::view('user_welcome_connected'); ?>
       <div class="grid_11"> cs</div>
        <?php theme::view('user_statut_connected'); ?> </div>

    <?php else : ?>

        <div class="grid_15 sub_menu">
            <?php theme::view('user_welcome_disconnected'); ?>
        </div>
        <?php theme::view('user_statut_disconnected'); ?>
    <?php endif; ?>

</div>
