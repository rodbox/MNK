<?php

class debug extends mnk{
// fais un var_dump indenté avec <pre>
    /*
     * function debug
     * @param $var // array
     */
    function debug($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

// fais un print_r indenté avec <pre>
    /*
     * function dataVar
     * @param $var // array
     */
    function dataVar($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}
?>
