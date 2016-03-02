<?php

//chdir(dirname(__FILE__));
require_once('mnk-core-config.php');
//require_once('mnk-db-config.php');

class mnk {
    const power = "client";
    const themeName  = "default";
    static $data = array();
    static $dataSend = array(); // variable de contenue pour les requetes depuis la fonction view();
    static $dataPagin = array(); // variable de contenue pour la pagination
    

    function mnk($mod = "") {
        $mod_defaut = array("db", "ui", "metro","theme", "msg", "file", "form", "str","img","user");
        $mod_list = ($mod != "") ? array_merge($mod, $mod_defaut) : $mod_defaut;

        foreach ($mod_list as $val)
            self::mod_load($val);
    }

    function mod_load($modName) {
        require_once(CORE . '/mod/mod_' . $modName . '.php');
    }
    
    function plugin_load($pluginFile){
        require_once(ABSPATH."/mnk-include/plug-ins/".$pluginFile);
    }
    
    function pack_controller($packName) {
        require_once(DIR_PACK . '/' . $packName .'/'. $packName .'-controller.php');
    }

    function pack_config($packName) {
        require_once(DIR_PACK . '/' . $packName .'/'. $packName .'-config.php');
    }
    
    function defautKeyValue($array,$key,$value=null){
        return (array_key_exists($key,$array))?$array:$array[$key] = $value;           
    }
    
    
    /*
     *  function chooseInc
     * @param $inc
     * @param $data
     */
    function chooseInc($inc=null,$data=null){
        $inc = ($inc==null && isset($_GET['page']))?$_GET['page']:$inc;
        if($inc!=null){
            if ($_GET['type']=="classic")
                self::incPage($inc);
            elseif ($_GET['type']=="pack-page"){
                
                $data = explode("/",$_GET['page']);
                self::incPackPage($data[0],$data[1]);
            }
                
        }
        else
          self::incPackPage("root","root-index");
    }
    
   
    
    function incPage($page){
         $fileDir    = ABSPATH."/mnk-front/content/pages/" . $page.".php";
          include (file_exists($fileDir)) ? $fileDir : ERROR_PAGE;
    }

    function incPackPage($pack,$page){
         $fileDir    = DIR_PACK."/".$pack."/pages/" . $page.".php";
          include (file_exists($fileDir)) ? $fileDir : ERROR_PAGE;
    }

    function title(){
        // extract($_GET['page'])
        // $_GET['page'] = (!isset($_GET['page']))?"root/root-index":$_GET['page'];
        if(isset($_GET['page'])){
            $packPage = explode("/",$_GET['page']);
            $pack = $packPage[0];
            $page = $packPage[1];
            self::iview("pack:root/title","",array("pack"=>$pack,"page"=>$page));
        }
        else {
            self::iview("pack:root/title","",array("pack"=>"root","page"=>"root-index"));
        }
    }


    ################################################
    /* chooseInc Link Editor  */
    ################################################

    /*
    exemple : ilink("page:news #monID.maclass1.maclass2.maclass3","le contenue de mon lien",'{"data":"ma data"}','{"class":"enplus"}');

    */
    function ilink ($dataLink,$content=null,$data=null,$attr=null){

        $metaLink   = explode(" ",$dataLink);
        $dataHref   = explode(":",$metaLink[0]);
        $typeHref   = $dataHref[0];
        $valueHref  = $dataHref[1];

        $metaHref = array(
            "exec"      => WEB_ROOT.'/mnk-include/exec.php?exec='.$valueHref."&type=classic",
            "pack-page" => WEB_ROOT.'/index.php?page='.$valueHref."&type=pack-page&",
            "pack-exec" => WEB_ROOT.'/mnk-front/pack/exec.php?exec='.$valueHref."&type=pack-exec&",
            "pack-view" => WEB_ROOT.'/mnk-front/pack/viewer.php?view='.$valueHref."&type=pack-view&",
            "cpl"       => WEB_ROOT.'/mnk-include/cpl.php?cpl='.$valueHref."&",
            "page"      => WEB_ROOT.'/index.php?page='.$valueHref."&type=classic&",
            "view"      => WEB_ROOT.'/index.php?page=viewer&view='.$valueHref."&type=classic&",
            "a-exec"    => WEB_ADMIN.'/exec.php?exec='.$valueHref."&type=classic&",
            "a-exec-test"=> WEB_ADMIN.'/exec.php?exec='.$valueHref."&type=test&",
            "a-cpl-test"=> WEB_ADMIN.'/cpl.php?cpl='.$valueHref."&type=test&",
            "a-page"    => WEB_ADMIN.'/index.php?page='.$valueHref."&",
            "a-view"    => WEB_ADMIN.'/viewer.php?view='.$valueHref."&",  
            "null"      => "#".$valueHref,       
            "#"         => "#".$valueHref,       
            "url"       => "http:".$dataHref[2]
        );

        $href       = $metaHref[$typeHref];

        $class      = explode (".",$metaLink[1]);
        $id         = str_replace("#","",array_shift($class));
        
        $class      = implode(" ",$class);
        $attr_ilink = array("id"=>$id, "class"=>$class);

         if (is_array($attr))
            $attr   = mnk::arrayMergeValue($attr,$attr_ilink);
        else
            $attr   = $attr_ilink;

        $attr       = mnk::attr($attr);

        $data       = (is_array($data))?mnk::paramLink($data):null;


        if ($content==null)
            echo '<a href="'.$href.$data.'" '.$attr.'>';
        else
            echo '<a href="'.$href.$data.'" '.$attr.'>'.$content.'</a>';
    }


    

    function linkOut(){
        echo "</a>";
    }



    function js($src) {

        $srcList = array(
            "core"      => WEB_ROOT.'/mnk-include/core/js/',
            "metro"     => WEB_THEME_LIST.'/metronic/template_content/assets/scripts/',
            "metro-plugins"     => WEB_THEME_LIST.'/metronic/template_content/assets/plugins/',
            "theme"     => WEB_ROOT.'/mnk-front/themes/default/js/',
            "pack"      => WEB_PACK."/",
            "test"      => WEB_ADMIN.'/test/',
            "plugins"   => WEB_ROOT.'/mnk-include/plug-ins/',
            "url"       => "",
            "a-core"    => WEB_ADMIN.'/js/',
            );

        if (is_array($src)) {
            foreach ($src as $val){
                $dataSrc = explode(":",$val);
                $fileName = $dataSrc[1];
                $fileSource = $dataSrc[0];

                if($fileSource=="pack"){
                    $data   = explode("/", $fileName);
                    $packName = $data[0];
                    $fileName = $data[1];
                    $fileLink = $srcList[$fileSource].$packName."/js/".$fileName;
                }
                else 
                    $fileLink = $srcList[$fileSource].$fileName;
                echo '<script src="' . $fileLink . '.js" language="javascript" type="text/javascript"></script>'."\n";

            }
        }
        else{
            $dataSrc = explode(":",$src);
                $fileName = $dataSrc[1];
                $fileSource = $dataSrc[0];
                if($fileSource=="pack"){
                    $data   = explode("/", $fileName);
                    $packName = $data[0];
                    $fileName = $data[1];
                    $fileLink = $srcList[$fileSource].$packName."/js/".$fileName;
                }
                else 
                    $fileLink = $srcList[$fileSource].$fileName;
                echo '<script src="' . $fileLink . '.js" language="javascript" type="text/javascript"></script>'."\n";
            }
        }


    /*
     * function css
     * @param $href // chemin du fichier css a inclure
     */

    function css($href) {
        $srcList = array(
            "core"      => WEB_ROOT.'/mnk-include/core/css/',
            "theme"     => WEB_ROOT.'/mnk-front/themes/default/css/',
            "metro"     => WEB_THEME_LIST.'/metronic/template_content/assets/css/',
            "metro-plugins"     => WEB_THEME_LIST.'/metronic/template_content/assets/plugins/',
            "test"      => WEB_ADMIN.'/test/',
            "pack"      => WEB_PACK.'/',
            "plugins"   => WEB_ROOT.'/mnk-include/plug-ins/',
            "url"       => "",
            "a-core"    => WEB_ADMIN.'/css/',
            );


        if (is_array($href)) {
            foreach ($href as $val){
                $dataSrc = explode(":",$val);
                $fileName = $dataSrc[1];
                $fileSource = $dataSrc[0];
                if($fileSource=="pack"){
                    $data   = explode("/", $fileName);
                    $packName = $data[0];
                    $fileName = $data[1];
                    $fileLink = $srcList[$fileSource].$packName."/css/".$fileName;
                }
                else 
                    $fileLink = $srcList[$fileSource].$fileName;
                
                echo '<link href="' . $fileLink . '.css" rel="stylesheet" type="text/css" />';
            }
        }
        else {
            $dataSrc = explode(":",$href);
            $fileName = $dataSrc[1];
            $fileSource = $dataSrc[0];
            if($fileSource=="pack"){
                    $data   = explode("/", $fileName);
                    $packName = $data[0];
                    $fileName = $data[1];
                    $fileLink = $srcList[$fileSource].$packName."/css/".$fileName;
                }
            else 
                $fileLink = $srcList[$fileSource].$fileName;
            echo '<link href="' . $fileLink . '.css" rel="stylesheet" type="text/css" />';
        }
    }
    
################################################
    /* DIVERS */
################################################

    function iheader($dataLink,$data=null){
        $data       = (is_array($data))?mnk::paramLink($data):null;

        $dataHref   = explode(":",$dataLink);
        $typeHref   = $dataHref[0];
        $valueHref  = $dataHref[1];

        $metaHref = array(
            "exec"      => WEB_ROOT.'/mnk-include/exec.php?exec='.$valueHref."&",
            "cpl"       => WEB_ROOT.'/mnk-include/cpl.php?cpl='.$valueHref."&",
            "page"      => WEB_ROOT.'/index.php?page='.$valueHref,
            "pack"      => WEB_PACK.'/'.$valueHref.".php",
            "pack-page" => WEB_ROOT.'/index.php?page='.$valueHref."&type=pack-page",
            "a-exec"    => WEB_ADMIN.'/exec.php?exec='.$valueHref."&type=classic",
            "a-exec-test"=> WEB_ADMIN.'/exec.php?exec='.$valueHref."&type=test",
            "a-cpl"     => WEB_ADMIN.'/mnk-include/cpl.php?cpl='.$valueHref."&",
            "a-page"    => WEB_ADMIN.'/index.php?page='.$valueHref."&",
            "a-view"    => WEB_ADMIN.'/viewer.php?view='.$valueHref."&",
//            "null"      => "#",       
            "url"       => "http:".$dataHref[2],
            "login"       => WEB_ROOT."/login.php"
        );

       $href       = $metaHref[$typeHref];
    //echo $href;
    header("Location:".$href.$data);
    }
    
    function iinc($dataInc,$data=null){
        $dataDir   = explode(":",$dataInc);
        $typeDir   = $dataDir[0];
        $valueDir  = $dataDir[1];

        $metaDir = array(
            "exec"      => DIR_ROOT.'/mnk-front/exec/'.$valueDir,
            "pack"      => DIR_PACK.'/'.$valueDir,
            "view"      => DIR_THEME_LIST . '/'.self::themeName.'/views/'.$valueDir,
            "page"      => DIR_ROOT.'/mnk-front/content/pages/'.$valueDir,
            "a-exec"    => DIR_ADMIN.'/exec/'.$valueDir,
            "a-test"    => DIR_ADMIN.'/test/'.$valueDir,
            "a-page"    => DIR_ADMIN.'/pages/'.$valueDir,
            "a-view"    => DIR_ADMIN.'/views/'.$valueDir
        );

        $dir = $metaDir[$typeDir];

        if($data!=null)
           self::setSend($data);
        $send = self::$dataSend;
        (include($dir.'.php'))?"":msg::error("Le fichier a inclure n'existe pas.");

        if (isset($d)){
            self::set($d);
            $d = self::$data;

            return $d;
        }


    }
    
    function absToWeb($dir) { return str_replace(DIR_ROOT, WEB_ROOT, $dir);}
    function webToAbs($dir) { return str_replace(WEB_ROOT, DIR_ROOT, $dir);}
    
    static function attr($attr) {
        $r = "";
        if (is_array($attr)) {
            foreach ($attr as $key => $val){
                if ($val!="") {
                   $r.= ' ' . $key . '="' . $val . '" ';
                }
                // if($attr_2!=null && is_array($attr_2)){
                //     if(array_key_exists($key,$attr_2)){
                //         $val .= $attr_2[$key];
                //     }
                // }
                
            }
        }
        return $r;
    }

    function arrayMergeValue($array_1,$array_2){
         if (is_array($array_1)&&  is_array($array_2)) {
            foreach ($array_1 as $key => $val){
                    if(array_key_exists($key,$array_2)){
                        $array_1[$key] .= " ".$array_2[$key]." ";
                        unset($array_2[$key]);
                    }
             
            }
            
            $array_merge = array_merge($array_1,$array_2);
        }
        elseif (!is_array($array_1))
            $array_merge = $array_2;
        else
            $array_merge = $array_1;
            
            
        return $array_merge;
        
    }
    
    
    
    function urlParamManag($url, $data="") {
        $data = ($data == "") ? array() : $data;
        $url_exp = explode("?", $url);
        $param = explode("&", $url_exp[1]);
        $param_tmp = array();


        foreach ($param as $key => $val) {
            $tmp = explode("=", $val);
            $param_tmp[$tmp[0]] = $tmp[1];
        }
        $param_tmp = array_merge($param_tmp, $data);
        $param_2 = http_build_query($param_tmp, '&amp;');
        $url_2 = $url_exp[0] . "?" . $param_2;

        return ($url_2);
    }

    function cssStyle($styleArray){
        $style = '';
        
        foreach ($styleArray as $key => $val){
            $style .= $key.': '.$val.'; ';   
        }

        return $style;
    }

    /*
     * function evalSession
     */

    function evalSession() {
        if (!isset($_SESSION))
            session_start();
    }

    function spacer($class="", $attr=null) {
        $attribute = self::attr($attr);
        return ('<img src="' . SPACER . '" class="' . $class . '" ' . $attribute . ' />');
    }

    function paramLink($param) {
        $r = "";

        if (is_array($param)) {
            foreach ($param as $key => $val)
                $r.= $key . '=' . $val . '&';

            $strSize = strlen($r);
            $r = substr($r, 0, ($strSize - 1));

            return $r;
        }
        else
            return false;
    }




function load_json($json_dir,$bol = true){
    $json = file_get_contents($json_dir);
    return json_decode($json,$bol);
}

function push_json($json_dir,$array){
    $json =  json_encode($array);
    return file_put_contents($json_dir,$json);
}




   function jsonToArray($file){

        $jsonFile = file_get_contents($file);

        return json_decode($jsonFile,true);
    }


// $strKey         = les cles de position a implantées interativement pour creer un arbre concaténé par des "."
    // ex : 1.1.2.4.10
// $valueKey       = la clés de la valeur implatées à la derniere clés de position.
// $value          = la valeur de la clés implatées à la derniere clés de position.
// $arrayInput     = le tableau de reference a importer. Si il n'existe pas le tableau est creer automatiquement.
// $childKey       = le nom de la clé pour les noeuds enfants

//    $array =  pushToKey("1.1.2.4.10","id","id 1",$array);

function pushToKey($strKey,$valueKey,$value,$arrayInput,$childKey="child"){
    $strCode = "\$arrayInput";
    if (preg_match("/./",$strKey)){
        $order = explode(".",$strKey);
        foreach ($order as $key => $val) {
            if($key>0)
                $strCode.="[".$childKey."]";
            $strCode.="[".$val."]";
        }
    }
    else 
        $strCode.="[".$strKey."]";

    $strCode.="[".$valueKey."]";
    $strCode  .= "='".$value."';";
    $strCode .= " return \$arrayInput;";

    return eval($strCode);
}

// execute en boucle pushToKey() a partir d'un array
// $dataList = array(
//     "1.1" => 
//         array(
//             "key1"=>"id",
//             "key2"=>"name"
//         ),
//     "1.2" => 
//         array(
//             "key1"=>"id",
//             "key2"=>"name"
//         )
//     );
function pushToKeyLoop($dataList,$arrayInput,$childKey="child"){    
    foreach ($dataList as $key => $value) {
        foreach ($value as $keyData => $valueData) {
            $arrayInput = self::pushToKey($key,$keyData,$valueData,$arrayInput,$childKey);
        }
    }
    ksort($arrayInput);
    return $arrayInput;
}


    // fais un print_r indenté avec <pre>
    /*
     * function dataVar
     * @param $var // array
     */
    function debug($var,$pos="normal") {
        echo '<div class="mnk-debug mnk-debug-pos-'.$pos.' ">';
        echo '<div class="mnk-debug-header">';
        ui::img("console",32,"fff");
        echo "</div>";
        echo '<pre class="alpha_5">';
        print_r($var);
        echo '</pre>';
        echo "</div>";
       
    }







    /*
     * function set
     * envois le contenue d'un model enregister dans la variable $d
     */
    function set($d){
         self::$data = array();
         self::$data = array_merge(self::$data,$d);//contenue de la variable passer du model a la vue
    }
    function setSend($dSend){
        self::$dataSend = array();
    self::$dataSend = array_merge(self::$dataSend,$dSend);//contenue de la variable passer du model a la vue
    }
    function setPagin($dPagin){
        self::$dataPagin = array();
    self::$dataPagin = array_merge(self::$dataPagin,$dPagin);//contenue de la variable passer du model a la vue
    }

/*
     * function getIndex
     */
    function iview($view_file_name,$model_file_name = null,$data=null,$paginate=null) {

        $dataView   = explode(":",$view_file_name);
        $type       = $dataView[0];
        $value      = $dataView[1];

        if ($type=="a-test"){
            $value  = explode("/",$value,2);
            $testName   = $value[0];
            $value      = $value[1];
            $model_file_name = ($model_file_name!=null)?$testName."/".$model_file_name:"";
       }

       elseif ($type=="pack"){
            $value  = explode("/",$value,2);
            $packName   = $value[0];
            $value      = $value[1];
            $model_file_name = ($model_file_name!=null)?$packName."/".$model_file_name:"";
       }
        $srcList   = array(
            "theme"     => DIR_THEME_LIST . "/".self::themeName."/views/".$value,
            "metro"     => DIR_THEME_LIST . "/metronic/views/".$value,
            "pack"      => DIR_PACK . "/".$packName."/views/".$value,
            "a-test"    => DIR_ADMIN.'/test/'.$testName."/views/".$value,
            "a-view"    => DIR_ADMIN.'/views/'.$value
        );

        $view = $srcList[$type];

        if($model_file_name!=null){

            if($data!=null)
                self::setSend($data);

            //self::debug($data);
            self::imodel($type.":".$model_file_name,$data,$paginate);
            $d = self::$data;
                    }
        
        if($data!=null&&$model_file_name==null)
            $d = $data;

        (include($view.'.php'))?"":msg::error("La view : '".$view."' n'existe pas.");

        // on vide la variable de transfert de données
        self::$data = array();
    }

    function iviewPag($view_file_name,$model_file_name = null,$data=null,$paginate=null) {

        $dataPaginate = array(
            'view_file_name'    => $view_file_name,
            'model_file_name'   => $model_file_name,
            'data'              => $data,
            'paginate'          => $paginate
        );

        self::iinc("view:paginate_header",$dataPaginate);
        self::iview($view_file_name,$model_file_name,$data,$paginate);

        self::iinc("view:paginate_footer",array_merge($dataPaginate,self::$dataPagin));
    }



    function imodel($model_file_name,$dataSend=null,$paginate=null,$return = false){
        $dataView   = explode(":",$model_file_name);
        $type       = $dataView[0];
        $value      = $dataView[1];

        if ($type=="a-test"){
            $value  = explode("/",$value,2);
            $testName   = $value[0];
            $value      = $value[1];
       }
       elseif($type=="pack"){
            $value  = explode("/",$value,2);
            $packName   = $value[0];
            $value      = $value[1];
        }

        $srcList   = array(
          //  "theme"     => DIR_ROOT .'/mnk-front/content/models/'.$value,
            "pack"      => DIR_PACK . "/".$packName."/models/".$value
          //  "a-test"    => DIR_ADMIN.'/test/'.$testName."/models/".$value,
          //  "a-view"    => DIR_ADMIN.'/models/'.$value
        );
        $model = $srcList[$type];

        $send=self::$dataSend;

        (include($model.'.php'))?"":msg::error("La model n'existe pas.");

        // ($paginate!=null)?("cur","byPage","paginateModel");
        if($paginate!=null && is_array($paginate)){
           $total      = count ($d);
           $curPage    = $paginate[0];
           $byPage     = $paginate[1];
           $nbPage     = ceil($total/$byPage);

           $dataPagin = array(
            'total'     => $total,
            'curPage'   => $curPage,
            'byPage'    => $byPage,
            'nbPage'    => $nbPage 
            );

           self::setPagin($dataPagin); 
           
           $d = array_splice($d, ($curPage-1)*$byPage, $byPage);


        }
        (isset($d))?self::set($d):"";
        return ($return)?$d:"";
    }

    function powerView($power_level,$type,$view_file_name,$model_file_name = null,$dataSend = null){
        $eval = user::user_power($power_level);


        if($eval)
            self::iview($type.":".$view_file_name,$model_file_name,$dataSend);
    }



 


    function pageTitle($title,$titleSmall){
        echo '<h3 class="page-title">'.$title.' <small>'.$titleSmall.'</small></h3>';
    }

    function fil(){
        if(isset($_GET['page'])){
            $packPage = explode("/",$_GET['page']);
            $pack = $packPage[0];
            $page = $packPage[1];
            self::iview("pack:root/fil","",array("pack"=>$pack,"page"=>$page));
        }
        else {
             self::iview("pack:root/fil","",array("pack"=>"root","page"=>"root-index"));
        }
    }

    function dayFr($numDay,$short=false){
        $day = array(
            array("Dimanche","Dim"),
            array("Lundi"   ,"Lun"),
            array("Mardi"   ,"Mar"),
            array("Mercredi","Mer"),
            array("Jeudi"   ,"Jeu"),
            array("Vendredi","Ven"),
            array("Samedi"  ,"Sam")
            );

        echo ($short)?$day[$numDay][1]:$day[$numDay][0];
    }



    function monthFr($numMonth,$short=false){
        $month = array(
            array("Janvier" ,"Jan"),
            array("Février" ,"Fév"),
            array("Mars"    ,"Mar"),
            array("Avril"   ,"Avr"),
            array("Mai"     ,"Mai"),
            array("Juin"    ,"Jui"),
            array("Juillet" ,"Jui"),
            array("Août"    ,"Aoû"),
            array("Septembre","Sep"),
            array("Octobre" ,"Oct"),
            array("Novembre","Nov"),
            array("Décembre","Déc")
        );

        echo ($short)?$month[$numMonth-1][1]:$month[$numMonth-1][0];
    }

}

?>