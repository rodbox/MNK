<?php 
class user extends app
{
	var $refConnect = "e1";

function user($app){
	if($app->power=="private"&&!isset($_SESSION["user"]))
		header("location:".WEB_ROOT."/user/".$this->refConnect);
	else
		{
			echo "";
		}
	// echo "<pre>";
	// print_r($_SESSION);
	// echo "</pre>";
	// if (true) {
	// 	header("location:".WEB_ROOT);
	// }
}
function userMenu(){
	echo '<div class="bg-0 rotate-45 c-4 z-overlay_5 rb-user">';
	echo '<div class="ingrid">';
	echo $_SESSION["user"]["name"];
	execLink("user","user_disconnect",ui::rimgSVG("close4",32,"disconnect"));
	echo '</div>';
	echo '</div>';
}
}  ?>