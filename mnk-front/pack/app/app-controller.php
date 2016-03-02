<?php
class app {
	var  $project;
	var  $idFunc;
	var  $func;
	var  $power;
	var  $src = '/homepages/17/d285347592/htdocs/sites/metronic.excentrik/mnk-users/0/rocket-v2/params';
	var  $actionUrl;
	var  $actionName;
	var  $json = array();
	var  $msgError = "- problème de chargement -";
	var  $success = false;
	var  $dataView;

	function app($project,$idFunc){
		$this->project 	= $project;
		$this->idFunc 	= $idFunc;

		$project 		= $this->src."/".$this->project.".json";

		$eval = file_exists($project);
		if ($eval){
			$content 	= file_get_contents($project);
	    	$json 		= json_decode($content,JSON_UNESCAPED_UNICODE);
	    	if($json)
	    		{
	    			$this->json = $json;
	    			$obj = $this->extractObj($idFunc);

	    			if($obj["typeID"]=="type-1"){
	    				$this->title 	= $obj["title"];
		    			$this->subTitle = $obj["helper"];
		    			$this->actionName = ($obj["submit"]=="")?"ok":$obj["submit"];
		    			$this->func 	= $obj["func"];
		    			$this->power 	= $obj["power"];
		    			$this->padding 	= $obj["app_padding"];
		    			$this->app_class = $obj["app_class"];
		    			$this->app_class_sub = $obj["app_class_sub"];
		    			$this->pointer 	= $obj["pointer"];
		    			$this->js 		= $obj["js_file"];
		    			$this->js_disable = $obj["js_file_disable"];
		    			$this->css 		= $obj["css_file"];
		    			$this->css_disable = $obj["css_file_disable"];
		    			$this->success 	= true;
	    			}
	    		}
		}
    }

    function appList(){
    	$this->formList($this->idFunc);
    }

    function appJS(){
    	if (is_array($this->js)){
			foreach ($this->js as $key => $value){
				if(!in_array($value, $this->js_disable)){
					$jsfile = explode("/", $value);
					$src ="http://metronic.excentrik.fr/mnk-front/pack/".$jsfile[0]."/js/".$jsfile[1].".js";
					echo "<script src='".$src."'></script>";
				}
			}
		}
    }

    function appCSS(){
    	if (is_array($this->css)){
			foreach ($this->css as $key => $value){
				$cssfile = explode("/", $value);
				$src ="http://metronic.excentrik.fr/mnk-front/pack/".$cssfile[0]."/css/".$cssfile[1].".css";
				echo "<link rel='stylesheet' href='".$src."'/>";
				// echo "<script src='".$src."'></script>";
			}
		}
    }

    function extractObj ($id){
    	return $this->json["elem"][$id];
    }
    function extractBook($elem){
    	return json_decode($elem["node_json"],true);
    }

    function appMenu($class="bg-3 sc-4"){
    	echo '<div class="app-menu hide '.$this->app_class_sub.'">';
    	$this->formView($this->extractObj($this->idFunc));
    	echo "</div>";
    	echo "<a href='#' id='toggle-app-menu' class='".$this->app_class_sub."'>";
    	echo " ";
    	echo "</a>";
    }


    function formView($d){
		extract($d);
		if (isset($view_form)&&$view_form!="") {


			$file = "view-form-".$view_form.".php";
	    	$dir = "/homepages/17/d285347592/htdocs/sites/metronic.excentrik/mnk-front/pack/rocket-v2/views/";
	    	$dir .= $file;
	    	if(file_exists($dir))
	   			include($dir);
   		}
   		else
   			echo "!!! erreur de chargement de champ => ".$id;
    }


    function formList($id){
    	$obj = $this->extractObj($id);
    	if(isset($obj["child"])&&$obj["child"]!=""){
	    	foreach ($obj["child"] as $key => $idChild) {
	    		$elem = $this->json["elem"][$idChild];
	    		$this->formView($elem);


				$this->formList($idChild);
	    	}
    	}
    }

function view($pack,$view,$model="",$data=""){
	$view = DIR_PACK."/".$pack."/views/".$view.".php";
	echo (include($view))?"": "La view '".$view."' n'existe pas.";
}


    function error(){
    	echo $this->msgError;
    	echo "<br/>";
    	appLink("user","e7","Homepage","padding-5");
    }
}
function appLink($project,$func,$content,$class="",$style="",$id=""){
	$json = json_encode(array("project"=>$project,"func"=>$func));

   	echo '<a id="'.$id.'" href="http://metronic.excentrik.fr/'.$project.'/'.$func.'" class="app-link '.$class.'" project="'.$project.'" func="'.$func.'" style="'.$style.'">'.$content.'</a>';
}

function execLink($pack,$exec,$content,$class="",$style="",$id=""){
   	$href ="http://metronic.excentrik.fr/mnk-front/pack/app/exec/app-exec.php";
	$href = $href."?pack=".$pack."&exec=".$exec;
   	echo '<a id="'.$id.'" href="'.$href.'" class="'.$class.'" style="'.$style.'">'.$content.'</a>';
}

function shareData(){
	echo '<select name="share">
	<option value="private">private</option>
    <option value="public">public</option>
    <option value="private-public">private-public</option>
</select>';
}

?>