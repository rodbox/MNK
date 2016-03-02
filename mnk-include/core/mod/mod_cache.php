<?php

    /* Gestion du cache */

    function noCache() {
        header('Pragma: no-cache');
        header('Expires: 0');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
    }
 function htmlComp($url, $fileName, $expire=null) {
        $handle = fopen($url, "r");
        $html = stream_get_contents($handle);
        fclose($handle);

        $file = DIR_PAGE_CACHE_INC . '/' . $fileName . '.html';


        $search = array("\s", "\t", "\r");
        //  $html = str_replace($search,'', $html);
        $html = preg_replace('/(\s\s+)||(\t)/', '', $html);

        //$html = preg_replace('/ \t /', '', $html) ;

        file_put_contents($file, $html);
    }    function cleanStyleAtt($str) {
        $str = preg_replace("(style=\".*?\")", "", $str);
        return $str;
    }
?>
