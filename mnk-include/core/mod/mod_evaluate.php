<?php
class evaluate extends mnk{
//valide la structure d'une adresse mail
    function check_Email($email) {
        $eval = preg_match('`^[[:alnum:]]([-_.]?[[:alnum:]])+_?@[[:alnum:]]([-.]?[[:alnum:]])+\.[a-z]{2,4}$`', $email);
        return ($eval) ? true : false;
    }
    
         /* $emptyListEval : array contenant comme valeur la liste des clés a tester
     * $dataArray	: array des donnés dont il faut tester la valeur des clés de $emptyListEval
     * 
     * retourne un tableau des clés de $dataArray possédant une valeur vide
     */

    function emptyListEval($dataArray, $emptyKeyList) {
        $emptyList = array();
        foreach ($emptyKeyList as $key => $value) {
            // on test si la valeur de la clés est vide
            $evalKey = empty($dataArray[$value]);
            // si la valeur correspondant a la clés est vide on ajoute la clés
            if ($evalKey)
                $emptyList[] = $value;
        }


        // on retourne la liste des clés contenant des champs vides
        return $emptyList;
    }

    /*
     * $emptyListEval : array contenant comme valeur la liste des clés a tester
     * $dataArray	: array des donnés dont il faut tester la valeur des clés de $emptyListEval
     * 
     * retourne true si tout les champs lister dans $emptyListEval ne sont pas vide
     */

    function empty_control($dataArray, $emptyKeyList) {
        $control = mnk::emptyListEval($dataArray, $emptyKeyList);
        $count = count($control);

        $r = ($count == 0) ? true : false;

        return $r;
    }



// renvois le tableau $array avec ses valeurs échappés par addcslashes()..
// le paramètre $scan est un tableau qui contient toutes les clés des valeurs a échappé de $array
    function slasheArray($array, $scan = NULL) {

        foreach ($array as $key => $value) {
            if (isset($scan) && is_array($scan)) {
                if (in_array($key, $scan))
                    $array[$key] = (is_array($value)) ? self::slasheArray($value, $scan) : addslashes($value);
            }
            else
                $array[$key] = (is_array($value)) ? self::slasheArray($value, $scan) : addslashes($value);
        }
        return ($array);
    }

// renvois le tableau $array avec ses valeurs décodé de addcslashes().
// le paramètre $scan est un tableau qui contient toutes les clés des valeurs a décodé de $array
    function stripSlasheArray($array, $scan = NULL) {
        foreach ($array as $key => $value) {
            if (isset($scan) && is_array($scan)) {
                if (in_array($key, $scan))
                    $array[$key] = (is_array($value)) ? self::stripSlasheArray($value, $scan) : stripcslashes($value);
            }
            else
                $array[$key] = (is_array($value)) ? self::stripSlasheArray($value, $scan) : stripcslashes($value);
        }
        return ($array);
    }

//
    function requireArray($array, $scan = NULL) {
        foreach ($array as $key => $value) {
            if (isset($scan) && is_array($scan)) {
                if (in_array($key, $scan))
                    $array[$key] = (is_array($value)) ? $this->requireArray($value, scan) : addslashes($value);
            }
            else
                $array[$key] = (is_array($value)) ? $this->requireArray($value, scan) : addslashes($value);
        }
    }/*
     * function returnEmpty
     * @param $keyList //array a anallyser
     * @param $scanArray //array comprenant la liste des key de $keyList a scanné
     */

    function returnEmpty($keyList, $scanArray) {
        foreach ($keyList as $key => $value) {
            if (empty($scanArray[$value]) || !isset($scanArray[$value]))
                $scanArray[$value] = '';
        }
        return ($scanArray);
    }
}
?>
