<?php class Controller extends mnk {
    var $data = array();
    var $dataPagin = array();
    var $var = array();
    var $class;
    
    function __construct() {

    }
    
    function set($d){
	$this->data = array();
	$this->data = array_merge($this->data,$d);
    }
    
    function setVar($v){
	$this->data = array();
	$this->var = array_merge($this->var,$v);
    }
    
    function model($filename){
	require(PACK.'/'.$this->class.'/'.self::power.'/models/'.$filename.'.php');

	(isset($d))?$this->set($d):"";
	(isset($v))?$this->setVar($v):"";
    }
 
    function view($view_filename){
	$view = PACK.'/'.$this->class.'/'.self::power.'/views/'.$view_filename.'.php';
        $d = $this->data; // insert les données dans $d

	$this->class = (!isset($this->class))?$class:$this->class;
	require($view);
    }   
    
    function jsPackExec($class,$file_js){
	echo '<script language="javascript" type="text/javascript">';
	require(PACK.'/'.$class.'/js/'.$file_js.'.js');
	echo '</script>';
    }
    
    /*
     * function render
     * @param $class
     * @param $model_filename
     * @param $view_filename
    */
    function render($class,$view_filename,$model_filename=null,$var=null,$paginate=null){
        $this->class = $class;

	//echo ($var!=null)?$var:"";

	if($paginate!=null){
	    $this->dataPagin = $paginate;
	    $this->paginIn($paginate);
	}
	
	    if ($model_filename!=null)
		$this->model($model_filename); // les données sont charger dans la variable $this->data
    
	    $d = $this->data; // insert les données dans $d
	    $this->view($view_filename);
            
	if($paginate!=null){
	    $this->paginOut($paginate);
	}
	$this->var = array();
	$this->data = array();
    }
    
    function paginIn($data,$paginate){
	echo '<div class="pagin_block">';
	    echo '<div class="pagin_content">';
    }
    function paginOut($data_paginate){
	echo '<div class="footerPagin">';
	    parent::mod_load('form');
	    $dataRender = "c=".$data_paginate['c']."&amp;m=".$data_paginate['m'];
	    form::hidden($dataRender,"renderPagin");

	    echo '<div class="pagin">';
	    
	    if($data_paginate['curPage']>1){
		$param = array(	'controller'=>$data_paginate['c'],
				'method'=>$data_paginate['m'],
			        'param'=>array('limit'=>$data_paginate['limit'],'curPage'=>1),
				'class'=>'pagin pagin_first',
				'content'=>parent::spacer());
		parent::loaderLink($param);
		unset($param);
		
		
		
		$param = array(	'controller'=>$data_paginate['c'],
				'method'=>$data_paginate['m'],
			        'param'=>array('limit'=>$data_paginate['limit'],'curPage'=>$data_paginate['curPage']-1),
				'class'=>'pagin pagin_prev',
				'content'=>parent::spacer());
		parent::loaderLink($param);
		unset($param);
	    }
	    
	    for($i=1;$i<=$this->dataPagin['nb'];$i++){
		$param = array(	'controller'=>$data_paginate['c'],
				'method'=>$data_paginate['m'],
			        'param'=>array('limit'=>$data_paginate['limit'],'curPage'=>$i),
				'class'=>($i==$data_paginate['curPage'])?"pagCur":"",
				'content'=>$i);
		parent::loaderLink($param);
		unset($param);
	    }
	    
	     if($data_paginate['curPage']!=$this->dataPagin['nb']){
		$param = array(	'controller'=>$data_paginate['c'],
				'method'=>$data_paginate['m'],
			        'param'=>array('limit'=>$data_paginate['limit'],'curPage'=>$data_paginate['curPage']+1),
				'class'=>'pagin pagin_next',
				'content'=>parent::spacer());
		parent::loaderLink($param);
		unset($param);
		
		$param = array(	'controller'=>$data_paginate['c'],
				'method'=>$data_paginate['m'],
			        'param'=>array('limit'=>$data_paginate['limit'],'curPage'=>$this->dataPagin['nb']),
				'class'=>'pagin pagin_last',
				'content'=>parent::spacer());
		parent::loaderLink($param);
		unset($param);
	    }
	echo '</div></div>';
    //ferme les balises de paginIn()
    echo '</div></div>';
    }
/*
    function rviewsUrl($packName, $viewName) {
        $url = WEB_ROOT . "/mnk-include/pack/" . $packName . "/views/" . $viewName . ".php";
        return $url;
    }

    function viewsUrl($packName, $viewName) {
        $url = mnk::rviewsUrl($packName, $viewName);
        echo $url;
    }
    function contHeader($pack, $method, $data="") {
        $data = ($data != "") ? "&" . $data : "";
        mnk::pHeader(0, "c=" . $pack . "&m=" . $method . $data);
    }function loadConfig($class) {
        $confif_Src = PACK . '/' . $class . '/controllers/mnk-' . $class . '-config.php';
        (file_exists($confif_Src)) ? include_once($confif_Src) : "";
    }/* CHARGE LA LIB 
*/
    static function loadControl($class) {
        if (is_array($class)) {
            foreach ($class as $val) {
                if ($val != "")
                    include_once(PACK . '/' . $val . '/'.self::power.'/controllers/mnk-' . $val . '.php');
            }
        }
        else
            include_once(PACK . '/' . $class . '/'.self::power.'/controllers/mnk-' . $class . '.php');
    }
    /*
     * function loader_Link
     * @param $controller
     * @param $method
     * @param $content
     */

    function rloaderLink($controller, $method=null, $param=null, $content=null, $attr=null) {

        $param = (isset($param) && is_array($param)) ? "&amp;" . self::paramLink($param) : "";
        $attribute = (isset($attr) && is_array($attr)) ? self::attr($attr) : "";
        $href = LOADER_CONTROL . '?c=' . $controller . '&amp;m=' . $method . $param;

        $a = '<a href="' . $href . '" ' . $attribute . '>' . $content . '</a>';

        return $a;
    }

    function loaderLink($controller, $method=null, $param=null, $content=null, $attr=null) {
        $a = self::rloaderLink($controller, $method, $param, $content, $attr);

        echo $a;
    }

    function loader($controller, $method, $param=null) {
        $param = (isset($param) && is_array($param)) ? "&amp;" . mnk::paramLink($param) : "";
        $href = LOADER_CONTROL . '?c=' . $controller . '&amp;m=' . $method . $param;
        return $href;
    }

    function loaderAdr() {
        mnk::loadControl("form");
        form::hidden(LOADER_CONTROL, "loaderAdr", "loaderAdr");
    }
  
}
?>
