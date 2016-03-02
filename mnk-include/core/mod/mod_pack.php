<?php
class pack extends mnk{

function jsPack($packName, $fileName='') {
        if (is_array($packName)) {
            foreach ($packName as $val) {

                $src = WEB_ROOT . "/mnk-include/pack/" . $val . "/".self::power."/js/" . $val . ".js";
                echo '<script src="' . $src . '" language="javascript" type="text/javascript"></script>' . "\n";
            }
        } else {

            $fileName = (empty($fileName)) ? $packName : $fileName;
            $src = WEB_ROOT . "/mnk-include/pack/" . $packName . "/".self::power."/js/" . $fileName . ".js";
            echo '<script src="' . $src . '" language="javascript" type="text/javascript"></script>' . "\n";
        }
    }

    function cssPack($packName, $fileName='') {
        if (is_array($packName)) {
            foreach ($packName as $val) {
                $href = WEB_ROOT . "/mnk-include/pack/" . $val . "/css/" . $val . ".css";
                echo '<link href="' . $href . '" rel="stylesheet" type="text/css" />' . "\n";
            }
        } else {
            $fileName = (empty($fileName)) ? $packName : $fileName;
            $href = WEB_ROOT . "/mnk-include/pack/" . $packName . "/css/" . $fileName . ".css";
            echo '<link href="' . $href . '" rel="stylesheet" type="text/css" />' . "\n";
        }
    }
 function pagePackList($pID) {


        $p['select'] = "page_ID, page_Lnk_Pack";
        $p['from'] = "mnk_page";
        $p['where'] = "page_ID = '" . $pID . "'";
        $r = mnk::reqSlt($p);
        $d = $r->fetchAll();

        $packList = explode(',', $d[0]['page_Lnk_Pack']);

        return($packList);
    }

    function packList() {
        $pack_dir_list = mnk::listDir(PACK);
        foreach ($pack_dir_list as $key => $val) {
            $packName = basename($val);
            $packList[$packName] = $packName;
        }
        return $packList;
    }
    
    function page($packName,$fileName){
        $pageSrc = ABSPATH . "/mnk-include/pack/" . $packName . "/".self::power."/pages/" . $fileName . ".php";
        
        (file_exists($pageSrc))?include($pageSrc):msg::errorMsg("Cet page de pack n'existe pas !");
    }
    
    function view($packName,$fileName){
        $pageSrc = ABSPATH . "/mnk-include/pack/" . $packName . "/".self::power."/views/" . $fileName . ".php";
        
        (file_exists($pageSrc))?include($pageSrc):msg::errorMsg("Cet view de pack n'existe pas !");
    }



    
    

}    
   
?>
