 <!-- BEGIN USER LOGIN DROPDOWN -->
 <li class="dropdown user">
 	<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php user::imgUser($_SESSION['user']['id'],$_SESSION['user']['name'],"32");?>
 		<span class="username"><?php echo $_SESSION['user']['name'];?></span>
 		<i class="icon-angle-down"></i>
 	</a>
 	<ul class="dropdown-menu">
 		<li>
 			<?php mnk::ilink("null .to-fullscreen", "","",array("rel"=>"body-fullscreen")); ?>
 			<?php ui::img("fullscreen", 16,"242424",array("class"=>"alpha_4")); ?>
 			fullscreen
 			<?php mnk::linkOut(); ?>
 		</li>
 		<li><?php mnk::ilink("pack-page:user/user_profile"); ?>
 			<?php ui::img("user", 16,"242424",array("class"=>"alpha_4")); ?>
 			Mon profil
 			</a>
 		</li>
 		<li>
 			<?php mnk::ilink("pack-exec:user/user_disconnect #loggout");?>
 			<?php ui::img("exit", 16,"242424",array("class"=>"alpha_4")); ?>Se déconnecter
 			</a>
 		</li>
 	</ul>
 </li>