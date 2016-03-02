<?php
class msg extends mnk{
    function success($msg,$class=""){
        $msg = ui::rimg("checkmark3","32").$msg;
        self::infosMsg($msg,"alert alert-sucess ".$class);
    }
    
    function error($msg,$class=""){
        $msg = ui::rimg("close","32").$msg;
        self::infosMsg($msg,"alert alert-error".$class);
    }

    function info($msg,$class=""){
        $msg = ui::rimg("close","32").$msg;
        self::infosMsg($msg,"alert alert-info".$class);
    }
    
    function infosMsg($msg,$class=""){
        echo '<div class="msg '.$class.'">';
        echo '<p>'.$msg.'</p>';
        echo '</div>';
        
    }
        /*
     * function msg
     * @param $msg
     */

    function msg($msg) {
        $m['msg'] = $msg;
        $r = json_encode($m);
        header('Content-type: application/json');
        echo $r;
    }
}
?>
