<?php
class ui extends mnk{
    


    function img($img,$size=16,$color="000",$attr=null){
      echo  self::rimg($img,$size,$color,$attr);
      //self::rimg($img,$size,$color);
    } 

    function rimg($img,$size=16,$color="000",$attr=null){

      if(!is_array($attr)&&$attr!=null){
        $attr["class"]=$attr;
      }

      $src = WEB_UI."/".$color."/".$size."px/".$img.".png";
      $style = array(
        "width" => $size."px",
        "height"=> $size."px",
        "background-image"=> "url(".$src.")");
      $style=self::cssStyle($style);
      $attr = self::attr($attr);
      return  '<img src="'.SPACER.'" '.$attr.' style="'.$style.'" />';
      //self::rimg($img,$size,$color);
    } 


   function imgSVG($img,$size=16,$color="000",$attr=null){
      echo  self::rimgSVG($img,$size,$color,$attr);
      //self::rimg($img,$size,$color);
    } 

    function rimgSVG($img,$size=16,$color="000",$attr=null){
       if(!is_array($attr)&&$attr!=null){
        $attr["class"]=$attr;
      }

      $src = WEB_UI_SVG."/".$img.".svg";
      $style = array(
        "width" => $size."px",
        "height"=> $size."px");
        
      $style=self::cssStyle($style);
      $attr = self::attr($attr);
      return  '<img src="'.$src.'" '.$attr.' style="'.$style.'" />';
      //self::rimg($img,$size,$color);
    } 

    function svg($svg,$size=32,$fillColor="white",$bgColor="turquoise",$class=""){

      $dir_svg = DIR_STATIC."/img/ui/Ultimate/Icons/SVG/";
      $dir_file = $dir_svg.$svg.'.svg';

      echo '<div class="svg-ui fill-'.$fillColor.'  svg-'.$size.' ">';
      echo file_get_contents($dir_file);
      echo '</div>';  
    }



    /* renvois la class css hide si la valeur de $comp n'est pas dans une des valeur du tableau $valList */
    function hideByVal($comp,$valList){
        $eval = in_array($comp, $valList);
        
        echo (!$eval)?" hide ":"";
    }

      function linkExecSwich($exec,$data=null,$statut=true){
        $switch_statut = ($statut)?"toggle-switch-on":"toggle-switch-off";

        $attr= array("class"=>"toggle-switch ".$switch_statut);
       self::ilink("exec:".$exec,mnk::spacer("toggle-switch"),$data,$attr);
      // self::linkExec($exec_2,$data,mnk::spacer("ui-toggle-off"),$attr);
    }


    
    /*Supprime la grille dans chaque fichier SVG */
    function cleanGridIcoMoon(){
      $DIR_uiFolder = DIR_STATIC."/img/ui/";
      $WEB_uiFolder = WEB_STATIC."/img/ui/";

      $web_img = $WEB_uiFolder."Ultimate/Icons/SVG/";
      $dir_img = $DIR_uiFolder."Ultimate/Icons/SVG/";

      $svgList = file::file_list($dir_img);

      foreach ($svgList as $key => $ico) {

        $web_file = $web_img.$ico;
        $dir_file = $dir_img.$ico;


        $svg = simplexml_load_file($dir_file);
        unset($svg->g);
        $svg->asXML($dir_file);
        


        echo "<a href='".$web_file."'>".$dir_file."</a>";
        echo "<br>";
}
    }



    
}
?>
