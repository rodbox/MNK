<?php
user::statutUpd($_SESSION['user']['id'],"0");
session_start();
session_destroy();
header("Location: ". $_SERVER[HTTP_REFERER]);
?>
fezfez