<div class="account_statut">

       
        <?php mnk::ilink("exec:user_disconnect #loggout",ui::rimg("x","16","white"));?>
        <span class="small green-light">Salut</span><br />
        <span class="user_name"><?php echo $_SESSION['user']['name'];?></span>


    <div class="account_statut-sub_menu ">
        <ul>
            <li><?php mnk::ilink("pack-page:user/user_account",ui::rimg("user")." My account");?></li>
            <li><?php mnk::ilink("pack-page:user/page:msg",ui::rimg("at")." Mes messages");?></li>
            
        </ul>
</div>
</div>