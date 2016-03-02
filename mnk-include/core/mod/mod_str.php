<?php
class str extends mnk{
 function sub($str, $n) {
        $strSize = strlen($str);
        $str = substr($str, 0, ($strSize - $n));

        return $str;
    }

    function limit($str, $nMax) {
        $strSize = strlen($str);

        $str = ($strSize >= $nMax) ? substr($str, 0, ($nMax - 3)) . "..." : $str;

        return $str;
    }

    function start($str, $nStart) {
        $strSize = strlen($str);

        $str = ($strSize >= $nMax) ? substr($str, $nStart, $strSize) : $str;

        return $str;
    }
    /*
     * function plur
     * @param $num // numéro de l'evaluation qui doit definir l'accord du pluriel
     * @param $sing // mot au singulier
     * @param $plur // mot au pluriel (si vide revois le singulier avec un 's')
     */

    function plur($num, $sing, $plur="") {

        $plur = (empty($plur)) ? $sing . "s" : $plur;

        if ($num > 1)
            return $plur;
        else
            return $sing;
    }

//retourne une chaine aléatoire de n caracteres (16 par defaut)
    /*
     * function randomString
     * @param $len // nb de caractere pour la chaine aléatoir
     */
    function randomString($len = 16) {
        $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
        $max = strlen($base) - 1;
        $activatecode = '';
        mt_srand((double) microtime() * 1000000);
        while (strlen($activatecode) < $len + 1)
            $activatecode .= $base{mt_rand(0, $max)};

        return ($activatecode);
    }// formate en francais une date avec l'heure à partir d'un format US ex: 2007-12-13 14:09:24 soit Année Mois Jour Heure Minute Sec
    /*
     * function formatTime
     * @param $d   // date au format US
     * @param $time // choisir d'afficher l'heure (true/false)
     * @param $sec // choisir d'afficher les secondes (true/false) si $time = true
     */
    function formatTime($d, $time=true, $sec=false) {

        if ($time) {
            if ($sec)
                $date = preg_replace('/^(.{4})-(.{2})-(.{2}) (.{2}):(.{2}):(.{2})$/', '$3/$2/$1 - $4:$5:$6', $d);
            else
                $date = preg_replace('/^(.{4})-(.{2})-(.{2}) (.{2}):(.{2}):(.{2})$/', '$3/$2/$1 - $4:$5', $d);
        }
        else
            $date = preg_replace('/^(.{4})-(.{2})-(.{2}) (.{2}):(.{2}):(.{2})$/', '$3/$2/$1', $d);
        return $date;
    }

    function linkInString($string) {
        $reg = '((http://|https://|www.)[a-zA-Z0-9/.\-?=&_]{3,})';
        preg_match_all($reg, $string, $matches);

        foreach ($matches[0] as $key => $val) {
            $val = (preg_match("/^www./", $val)) ? "http://" . $val : $val;
            $link[] = '<a href="' . $val . '">' . $val . '</a>';
        }

        $r = (isset($link)) ? str_replace($matches[0], $link, $string) : $string;
        return $r;
    }//convertit les / par les \ pour les chemins de fichier
    /*
     * function convPath
     * @param $dir // nb d'etape
     */
    function convPath($dir) {
        $dir = strtr($dir, "/", "\\");
        return ($dir);
    }    function format_float($num) {
        $numF = (is_float($num)) ? number_format($num, 2, ',', ' ') : number_format($num, 0, ',', ' ');
        return $numF;
}    function convDirWebtoAbs($dir) {
        $dir = str_replace(WEB_ROOT, ABSPATH, $dir);
        return $dir;
    }

    function convDirAbstoWeb($dir) {
        $dir = str_replace(ABSPATH, WEB_ROOT, $dir);
        return $dir;
    }
}
?>
