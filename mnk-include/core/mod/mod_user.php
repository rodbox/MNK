<?php 
class user extends mnk {
    
    function user_power($power_Level = 1){
        $power_Level = explode(",",$power_Level);
        
        if(isset($_SESSION['user']['power'])){
            if ($power_Level!=0){
                return (in_array($_SESSION['user']['power'],$power_Level));
            }
        }
        elseif(in_array(0,$power_Level))
            return true;
    }
 
    function powerZone($powerRequired){
       mnk::debug($_SESSION);
    }

     function statutUpd($user_ID,$statut,$user_Confirm=1){
	//parent::evalSession();
        if($user_Confirm==1){
	$p      = array(
            'update' => "mnk_user_statut",
            'where'  => "statut_user_ID = ".$user_ID,
            'value'     => array(
                "statut_Statut"=>$statut,
                "statut_Date_Upd"   => db::dbTime(),
                "statut_Ip"  => $_SERVER['REMOTE_ADDR']
            ));

	db::reqUpd($p);
        }
        else
            self::statutAdd($user_ID,$statut);
    }

    function statutAdd($user_ID,$statut){
        $p      = array(
            'insert_into' => "mnk_user_statut",
            'value'     => array(
                "statut_user_ID"   => $user_ID,
                "statut_Statut"=>$statut,
                "statut_Date_Upd"   => db::dbTime()
            ));

	db::reqAdd($p);
        self::statutConfirm($user_ID);
    }
    
    function statutConfirm($user_ID){
        $p      = array(
            'update' => "mnk_user",
            'where'  => "user_ID = ".$user_ID,
            'value'     => array(
                "user_Confirm"=>1)
            );

	db::reqUpd($p);
    }
    
    function imgUser($user_id,$user_name,$size = 32,$defaultColor ="fff"){
        $imgSrc = WEB_ROOT."/mnk-front/upload/profiles/profile_".$user_id."_".$size.".jpg";
        if(file_exists(mnk::webToAbs($imgSrc)))
            img::simg($imgSrc,array("alt"=>$user_name,"class"=>"profile profile_".$size));
        else
            ui::img("user",$size,$defaultColor,array("class"=>"alpha_4 profile profile_".$size));
    }
    
}?>