<div class="account_statut ">

        <?php mnk::ilink("pack-exec:user/user_disconnect #loggout",ui::rimg("close2","16","fff"));?>
        <span class="small green-light">Salut</span> <span class="user_name"><?php echo $_SESSION['user']['name'];?></span>
        <?php ui::img("arrow-down2","16","000",array("id"=>"deco")); ?>

    <div class="account_statut-sub_menu z-overlay_1">
        <ul>
            <li>
                
                <?php mnk::ilink("pack-page:user/user_account ",ui::rimg("vcard","16","fff")." My account");?></li>
            <!-- <li><?php mnk::ilink("page:msg .to-meta-right",ui::rimg("envelop","16","fff")." Mes messages");?></li> -->
            
        </ul>
    </div>
</div>