<?php extract($d[0]); ?>
<div class="portlet-padding">

		<div class="span3 center">
			<?php mnk::iview("pack:user/user_profile_upload","user_account"); ?>
		</div>

		<div class="span7">
			<ul class="user_data">
				<li><h2><?php echo $_SESSION['user']['name']; ?></h2></li>
				<li><?php ui::img("envelop2","16","242424",array("class"=>"alpha_2")); ?> <?php echo $user_Mail; ?></li>
				<li><?php ui::img("user","16","242424",array("class"=>"alpha_2")); ?> <?php echo $user_Civ; ?> <?php echo $user_Last; ?> <?php echo $user_First; ?></li>
				<li><?php ui::img("key","16","242424",array("class"=>"alpha_2")); ?> <?php mnk::ilink("pack-exec:user/user_pw_redefine","redéfinir le mot de passe"); ?></li>
			</ul>

		</div>
		<div class=" right">
			<?php echo date("d-m-Y",strtotime($user_Date_Time_Crea)); ?><br>
			<span class="small"><?php echo date("H:i",strtotime($user_Date_Time_Crea)); ?></span>
		</div>
		<div class="clearfix"></div>


		<div class="clearfix"></div></div>