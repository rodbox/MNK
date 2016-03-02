<?php 
session_start();
/*mnk::debug($_POST);mnk::debug($_SESSION);*/


$_SESSION['user']['ui']['sidebar'] = $_POST['body'];
 ?>