<?php

class creator_pack {
    
    function createPack($packName="pack"){
        $tmpPack = TMP."/".$packName;
        $finalPack = PACK."/".$packName;
        
        if (!file_exists($finalPack)){
            
        
        // on copi le model de pack dans le dossier TMP
        file::copy_dir(PACK_MODEL,$tmpPack);
        
        // on renomme tout les fichiers avec le nom du nouveau pack
        self::renamePack($tmpPack,$packName);
        
        // on renomme le nom de la class du fichier controller
        self::renameClassPackController($tmpPack,$packName);
        
         // on copi de pack tmp dans le dossier pack
        file::copy_dir($tmpPack,$finalPack);
        
        
        
        msg::successMsg(ui::rimg("valid","64")." <span class='small'>Pack :</span><br /> <strong>".$packName ."</strong> créée avec succées !");
        }
        else
            msg::successMsg(ui::rimg("error","64")." <span class='small'>Pack :</span><br /> <strong>".$packName ."</strong> existe déja !");

    }
    
    function renamePack($packDir,$newname){
        
        $file2rename = array (
           "/admin/controllers/mnk-pack.php",
           "/admin/controllers/mnk-pack-config.php",
           "/admin/js/pack.js",
           "/admin/css/pack.css",
           "/client/controllers/mnk-pack.php",
           "/client/controllers/mnk-pack-config.php",
           "/client/js/pack.js",
           "/client/css/pack.css",
           "/mod/controllers/mnk-pack.php",
           "/mod/controllers/mnk-pack-config.php",
           "/mod/js/pack.js",
           "/mod/css/pack.css"
        );
        
        foreach($file2rename as $val){
            $oldFileName = $packDir.$val;
            $newFileName = str_replace("pack", $newname, $oldFileName);
            
            
             //renomme les fichiers controllers       
        rename($oldFileName,$newFileName);
          
            
        }
       
    }

    function renameClassPackController($packDir,$newname){
        $powerLevel = array("admin","client","mod");
        
        foreach ($powerLevel as $val){
            $file = $packDir."/".$val."/controllers/mnk-".$newname.".php";

            $contentModel = file_get_contents($file);
            $content = str_replace("[pack]", $newname, $contentModel);
            file_put_contents($file,$content); 
        }
        
    }
    
    
    
}
?>
