<?php
class theme extends mnk {
    
    const themeName  = "default";
    static $data = array(); // variable de contenue du models a la vue
    static $dataSend = array(); // variable de contenue pour les requetes depuis la fonction view();
    
    /*
     * function set
     * envois le contenue d'un model enregister dans la variable $d
     */
    function set($d){
	     self::$data = array();
	     self::$data = array_merge(self::$data,$d);//contenue de la variable passer du model a la vue
    }

    function setDataSend($dataSendFromFunctionView){
        self::$dataSend = array();
	self::$dataSend = array_merge(self::$dataSend,$dataSendFromFunctionView);//contenue de la variable passer du model a la vue
    }
    
    
     /*
     * function getHeader
     */

    function getHeader() {
        include (DIR_THEME_LIST . "/" . self::themeName . "/views/header.php");
    }

    /*
     * function getFooter
     */

    function getFooter() {
        include (DIR_THEME_LIST . "/" . self::themeName . "/views/footer.php");
    }

    /*
     * function getIndex
     */
    function getIndex() {
       
        include (DIR_THEME_LIST . "/" . self::themeName . "/index.php");
    }

    /*
     * function getTemp
     */
    function getTemp($model_file) {
        include (DIR_THEME_LIST . "/" . self::themeName . "/views/".$model_file.".php");
    }
    
    function dirTheme() {
        return WEB_THEME_LIST . "/" . self::themeName;
    }
    
    function themeName() {

        $p= array(
                'from' => "mnk_config",
                'where'=> "conf_Name = 'theme_select'");

        $r = mnk::reqSlt($p);
        $d = $r->fetchAll();

       return $d[0]['conf_Val'];

    }
    
    



    function favicon($faviconFile = "favicon"){
        
        echo '<link rel="shortcut icon" href="' . theme::dirTheme() . '/img/'.$faviconFile.'.ico" type="image/x-icon">';
        echo '<link rel="icon" href="' . theme::dirTheme() . '/img/'.$faviconFile.'.ico" type="image/x-icon">';
        
    }
    
    function simg($file,$attr=null) {
      echo  self::rimg($file,$attr);
    }

    function rimg($file,$attr=null) {
        self::mod_load("img");
        self::mod_load("theme");

        $meta = explode(" ", $file);
        $class      = explode (".",$meta[1]);
        $id         = str_replace("#","",array_shift($class));
        
        $class      = implode(" ",$class);
        $attr_img = array("id"=>$id, "class"=>$class);

        $src = theme::dirTheme() . "/img/" . $meta[0];
        return img::rimg($src,$attr_img);
    }
    
    /*
     * function dataImg
     * @param $data = array qui attribut une class a partir de la valeur de la clés
     */

    function dataImg($keyValue,$data=null,$attr=null) {
        $attrData   = array("class"=>" mnk-data-img");
        $attr   = self::arrayMergeValue($attr,$attrData);
        
        $data_default =  array("cross-11.png","check-11.png");
        
        $data = (is_array($data))?$data:$data_default;
        
        self::simg($data[$keyValue],$attr);
    }
    
    
    // function powerView($power_level,$view_file_name,$model_file_name = null,$dataSend = null){
    //     $eval = user::user_power($power_level);
    //     if($eval)
    //         self::view($view_file_name,$model_file_name,$dataSend);
    // }
    
    // /*
    //  * function getIndex
    //  */
    // function view($view_file_name,$model_file_name = null,$dataSend = null) {
    //     if($dataSend!=null){
    //         self::setDataSend($dataSend);
    //     }
        
    //     if($model_file_name!=null){
    //         self::model($model_file_name);
    //         $d = self::$data;
    //     }

    //     if($dataSend!=null&&$model_file_name==null){
    //         $d = $dataSend;
    //     }      

    //     include (DIR_THEME_LIST . "/" . self::themeName . "/views/" . $view_file_name . ".php");
    // }
    




    // function model($model_file_name,$paginate=null){
    //     $send=self::$dataSend;
    //     include (ABSPATH . "/mnk-front/content/models/" . $model_file_name . ".php");
    //     (isset($d))?self::set($d):"";
    // }
 
}
?>
