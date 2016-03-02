<?php

class file extends mnk {

    function template($name, $targetDir, $createName,$replace=false,$msg_return = true) {
        $dest = $targetDir . "/" . $createName;

       // echo DIR_TEMPLATE . "/" . $name;
        // on copi le template
        if (!file_exists($dest) || $replace==true) {

            file::copy_dir(DIR_TEMPLATE . "/" . $name, $dest);
            ($msg_return)?msg::success("template : '".$name."' creer"):"";
        }
        else
            ($msg_return)?msg::error("Le dossier de destination existe déja."):"";
    }


    function templateFile($type, $targetDir, $newFileName,$replace=false,$msg_return = true) {

        $srcFile = array(
            "css"       =>"style.css",
            "php"       =>"php.php",
            "js"        =>"js.js",
            "sublime-snippet"   =>"snippet.sublime-snippet",
            "json"   =>"json.json",
            "jquery-plugin"   =>"jquery-plugin.js",
            "html"      =>"html.html"
        );

        $src    = DIR_TEMPLATE . "/files/" . $srcFile[$type];
        $dest   =  $targetDir."/".$newFileName.".".$type;
        if (!file_exists($dest)) {
            if(copy($src, $dest)){
                (is_array($replace))?file::replace_Key_Val_File($replace, $dest, $dest):"";
                ($msg_return)?msg::success("file template : '".$newFileName."' creer"):"";
                //return ($dest);
            }
            else
                ($msg_return)?msg::error("Le fichier de desitination existe déja."):"";
        }
        else
            ($msg_return)?msg::error("Le fichier de desitination existe déja."):"";

    }

    function copy_dir($dir2copy, $dir_paste) {

        // On vérifie si $dir2copy est un dossier
        if (is_dir($dir2copy)) {

            // Si oui, on l'ouvre
            if ($dh = opendir($dir2copy)) {

                // On liste les dossiers et fichiers de $dir2copy
                while (($file = readdir($dh)) !== false) {

                    // Si le dossier dans lequel on veut coller n'existe pas, on le créé
                    if (!is_dir($dir_paste))
                        mkdir($dir_paste, 0777);

                    // S'il s'agit d'un dossier, on relance la fonction récursive
                    if (is_dir($dir2copy . '/' . $file) && $file != '..' && $file != '.')
                        self::copy_dir($dir2copy . '/' . $file . '/', $dir_paste . '/' . $file . '/');
                    // S'il sagit d'un fichier, on le copue simplement
                    elseif ($file != '..' && $file != '.')
                        copy($dir2copy . '/' . $file, $dir_paste . '/' . $file);
                }

                // On ferme $dir2copy
                closedir($dh);
                return true;
            }
        }
    }


    function replace_Key_Val_File($data, $fileModel, $fileDest = null) {

        foreach ($data as $key => $val) {
            $find[] = "[" . $key . "]";
            $replace[] = $val;
        }
        $contentModel   = file_get_contents($fileModel);
        $content        = str_replace($find, $replace, $contentModel);

        if($fileDest == null)
            return $content;
        else
            file_put_contents($fileDest, $content);
    }



    /*
      Retourne la liste des fichiers et dossier d'un dossier
     */

    function listDir($dir) {
        if (is_dir($dir)) {
            $filter = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp"); //list des nom de fichier ou de dossier a ne pas indexer
            $list = scandir($dir); // on scan le dossier
            $r = array_diff($list, $filter); // on filtre le resultat
            foreach ($r as $val) {

                $src = $dir . "/" . $val;
                $d[] = $src;
            }
            return $d;
        }
        else
            return array();
    }

    function folder_list($dir) {

        $filter     = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp"); //list des nom de fichier ou de dossier a ne pas indexer
        $list       = scandir($dir); // on scan le dossier
        $r          = array_diff($list, $filter); // on filtre le resultat
        foreach ($r as $val) {
            $src = $dir . "/" . $val;

            if (is_dir($src))
                $d[] = $src;
        }
        return $d;
    }

    function file_list($dir) {
        $filter     = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp"); //list des nom de fichier ou de dossier a ne pas indexer
        $list       = scandir($dir); // on scan le dossier
        $r          = array_diff($list, $filter); // on filtre le resultat

        foreach ($r as $key => $val) { //on parcour chaque element
            if (is_dir($dir . "/" . $val)) {
                unset($r[$key]); // on supprime le nom du dossier dans la liste de resultat car elle utilisé en clé pour les sous dossiers
                $r[$val] = self::file_list($dir . "/" . $val);
            }
        }

        return $r;
    }

    function file_list_mono($dir, $suffix = null) {
        $filter     = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp"); //list des nom de fichier ou de dossier a ne pas indexer
        $suffix     = ($suffix != null) ? $suffix . "/" : null;

        $list       = scandir($dir); // on scan le dossier
        $r          = array_diff($list, $filter); // on filtre le resultat

        foreach ($r as $key => $val) { //on parcour chaque element
            if (is_dir($dir . "/" . $val)) {
                unset($r[$key]); // on supprime le nom du dossier dans la liste de resultat car elle utilisé en clé pour les sous dossiers
                // echo $dir."/".$val."\n";
                $rsub = self::file_list_mono($dir . "/" . $val, $suffix . $val);
                foreach ($rsub as $key2 => $val2) {
                    $r[] = $val2;
                }
            } else {
                $r[$key] = ($suffix != null) ? $suffix . $val : $val;
            }
            // $r = array_merge($r,$sub);
        }

        return $r;
    }

    /* creer un fichier encoder en utf8 */

    function create_file_exe($dir, $fileName, $content) {
        $dirFile = $dir . "/" . $fileName;
        $eval = file_exists($dirFile);
        if (!$eval) {
            $newFile = fopen($dirFile, "w");
            fwrite($newFile, pack("CCC", 0xef, 0xbb, 0xbf));
            fwrite($newFile, utf8_encode($content));
            fclose($newFile);
        }
    }

    static function keyValFileContent($data, $fileModel) {

        foreach ($data as $key => $val) {
            $find[] = "[" . $key . "]";
            $replace[] = $val;
        }
        $contentModel = file_get_contents($fileModel);
        $content = str_replace($find, $replace, $contentModel);

        return $content;
    }

    function keyValContent($data, $contentModel) {
        foreach ($data as $key => $val) {
            $find[] = "[" . $key . "]";
            $replace[] = $val;
        }
        $content = str_replace($find, $replace, $contentModel);

        return $content;
    }

    function rmdir_all($filepath) {
        if (is_dir($filepath) && !is_link($filepath)) {
            if ($dh = opendir($filepath)) {
                while (($sf = readdir($dh)) !== false) {
                    if ($sf == '.' || $sf == '..') {
                        continue;
                    }
                    if (!self::rmdir_all($filepath . '/' . $sf)) {
                        throw new Exception("$filepath $sf  n'a pas pu être supprimé.");
                    }
                }
                closedir($dh);
            }
            return rmdir($filepath);
        }
        return unlink($filepath);
    }

    function format_taille($size) {
        if ($size == 0)
            return "0";
        $liste  = array(" octets", " Ko", " Mo", " Go", " To");
        $index  = floor(log($size) / log(1024));
        $frm    = (($size > 1023) ? ("%3.2f") : ("%d"));

        return sprintf("$frm%s", (($size) ? ($size / pow(1024, $index)) : "0"), $liste[$index]);
    }

    
    
    function dir_size($dir) {
        $filter = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp"); //list des nom de fichier ou de dossier a ne pas indexer
        $list   = scandir($dir); // on scan le dossier
        $r      = array_diff($list, $filter); // on filtre le resultat

        foreach ($r as $key => $val) { //on parcour chaque element
            $cur = $dir . "/" . $val;
            if(is_dir($cur)){
                $dirSize  = self::dir_size($cur);
                $size = $size+$dirSize;
                
            }
            else
             $size = $size+filesize($cur);
           
        }
       // debug::dataVar($list);
        return $size;
    }
    
    function filename ($file){
        $infos = pathinfo($file);
        return $infos['filename'];
    }

    function ext ($file){
        $infos = pathinfo($file);
        return $infos['extension'];
    }
    
}

?>
