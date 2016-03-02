<?php

class admin extends mnk {

    static $data = array(); // variable de contenue du models a la vue
    static $dataSend = array(); // variable de contenue pour les requetes depuis la fonction view();

    /*
     * function set
     * envois le contenue d'un model enregister dans la variable $d
     */

    function set($d) {
        self::$data = array();
        self::$data = array_merge(self::$data, $d); //contenue de la variable passer du model a la vue
    }

    function setDataSend($dataSendFromFuncView) {
        self::$dataSend = array();
        self::$dataSend = array_merge(self::$dataSend, $dataSendFromFuncView); //contenue de la variable passer du model a la vue
    }

    /*
     * function getHeader
     */

    function getHeader() {
        include (DIR_ADMIN . "/" . "/views/header.php");
    }

    /*
     * function getFooter
     */

    function getFooter() {
        include (DIR_ADMIN . "/" . "/views/footer.php");
    }

    /*
     * function getIndex
     */

    function getIndex() {
        include (DIR_ADMIN . "/" . "/index.php");
    }

    function getTest($test,$file=null){
        $file = ($file==null)?$test:$file;
        include (DIR_ADMIN . "/test/".$test . "/".$file.".php");
    }
    


    /*
     * function getTemp
     */

    function getTemp($model_file) {
        include (DIR_ADMIN . "/" . "/views/" . $model_file . ".php");
    }
    
    function txtTest($test,$file="infos"){
        $infos = file_get_contents(WEB_ADMIN . '/test/'.$test.'/'.$file.'.txt');
        echo $infos;
    }
   

    function getTestSource($test,$type="php",$file_name="test"){
        $file = DIR_ADMIN."/test/".$test."/".$file_name.".".$type;
        if (file_exists($file))
            echo "<pre class='code'><code>".htmlspecialchars(file_get_contents($file))."</code></pre>";
    }
    
    function simg($file, $attr = null) {
        echo self::rimg($file, $attr);
    }

    function rimg($file, $attr = null) {
        self::mod_load("img");
        self::mod_load("theme");
        $src = WEB_ADMIN . "/img/" . $file;
        return img::rimg($src, $attr);
    }

    /*
     * function getIndex
     */

    function view($view_file_name, $model_file_name = null, $dataSend = null) {
        if ($dataSend != null) {

            self::setDataSend($dataSend);
        }


        if ($model_file_name != null) {
            self::model($model_file_name);
            $d = self::$data;
        }
        include (DIR_ADMIN . "/views/" . $view_file_name . ".php");
    }

    function model($model_file_name) {
        $send = self::$dataSend;
        include (DIR_ADMIN . "/models/" . $model_file_name . ".php");
        (isset($d)) ? self::set($d) : "";
    }

    function toggleView($view_1, $view_2, $model = null, $dataSend = null) {
        echo '<div class="toggle-view">';
            echo '<div class="view_1 view view-on">';
                self::view($view_1, $model, $dataSend);
            echo '</div>';
            echo '<div class="view_2 view">';
                self::view($view_2, $model, $dataSend);
            echo '</div>';
        echo ' </div>';
    }

    /*
     *  function chooseInc
     * @param $inc
     * @param $data
     */

    function chooseInc($inc = null, $data = null) {
        $inc = ($inc == null && isset($_GET['page'])) ? $_GET['page'] : $inc;
        if ($inc != null) {
            self::incPage($inc);
        }
        else
            self::incPage("home");
    }

    function incPage($page) {
        $fileDir = DIR_ADMIN . "/pages/" . $page . ".php";
        include (is_file($fileDir)) ? $fileDir : ERROR_PAGE;
    }

}

?>
