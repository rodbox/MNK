<?php 
if (user::user_power(0))
	mnk::iheader("login:login");

elseif ($_GET['live'] == true)
    mnk::chooseInc();

else {
    theme::getHeader();
    mnk::chooseInc();
    theme::getFooter();
} ?>

     