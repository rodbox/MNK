<?php

class ui extends app
{
	function 	rimgSVG($img,$size=16,$class="",$style="",$id=""){

      $src = WEB_UI_SVG."/".$img.".svg";
      $style .= "width :" .$size."px; ";
      $style .= "height :" .$size."px; ";


      return  '<img src="'.$src.'" style="'.$style.'" class="'.$class.'" />';
	}
	function 	imgSVG($img,$width=16,$class,$style,$id){
		echo self::rimgSVG($img,$width,$class,$style,$id);
	}

	function rbg($img,$width="",$position="6px center",$repeat="no-repeat"){
		$src = WEB_UI_SVG."/".$img.".svg";

		$bg = "background-image: url('".$src."');";
		$size = ($width!="")?"background-size: ".$width."px ".$width."px ;":"";
		$position = "background-position: ".$position.";";
		$repeat = "background-repeat: ".$repeat.";";
		return $bg." ".$size." ".$position." ".$repeat;

	}

	function bg($img,$width="",$position="6px center",$repeat="no-repeat"){
		echo self::rbg($img,$width,$position,$repeat);
	}

}
?>