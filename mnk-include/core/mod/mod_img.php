<?php
class img extends mnk{
    function rimg($src, $attr=null, $no_cache = false) {

        $attribute = form::attr($attr);
        $src = ($no_cache) ? $src . "?uniqID=" . md5(time()) : $src;
        $img = '<img src="' . $src . '" ' . $attribute . ' />';

        return $img;
    }

    function simg($src, $attr=null, $no_cache = false) {
        echo self::rimg($src, $attr, $no_cache);
    }

    function simgGal($gal,$file=null,$type=null,$attr=null,$no_cache = false){
        $attrGal = array("class"=>$type);
        $attr   = self::arrayMergeValue($attr,$attrGal);
        $img_url = WEB_GAL . "/" . $gal . "/".$type."/" . $file;
   
        self::simg($img_url,$attr,$no_cache);
    }


function packSimg($file,$attr=null) {

      echo  self::packRimg($file,$attr);
    }

    function packRimg($file,$attr=null) {
        self::mod_load("img");


        $meta = explode(" ", $file);
        $class      = explode (".",$meta[1]);
        $id         = str_replace("#","",array_shift($class));
        
        $class      = implode(" ",$class);
        $attr_img = array("id"=>$id, "class"=>$class);


        $img = explode("/",$meta[0]);
        $src = WEB_PACK . "/".$img[0]."/img/" . $img[1];
        return img::rimg($src,$attr_img);
    }



    function simgGalFolder($gal,$attr=null,$no_cache = false){
        $attrGal = array("class"=>"folder");
        $attr   = self::arrayMergeValue($attr,$attrGal);
        $img_url = WEB_GAL . "/" . $gal . "/folder.jpg";
        self::simg($img_url,$attr,$no_cache);
    }

    function zoomSimg($src, $pref, $alt_text=null, $class=null, $id=null) {
        $pref = ($pref == "") ? "_B" : $pref;
        $src_infos = pathinfo($src);
        $src_2 = $src_infos['dirname'] . "/" . $src_infos['filename'] . $pref . "." . $src_infos['extension'];

        echo '<a href="' . @$src_2 . '" title="zoomer sur : ' . $alt_text . '" class="color_box">';
        self::simg($src, $alt_text, $class, $id);
        echo '</a>';
    }

    function uimg() {

    }

    
    function simgCore($filename, $attr=null, $no_cache = false) {
        
        echo self::rimgCore($filename, $attr, $no_cache);
    }
    
     function rimgCore($filename, $attr=null, $no_cache = false) {
        $src = WEB_ROOT."/mnk-include/core/img/".$filename;
        return self::rimg($src, $attr, $no_cache);
    }
    
    
    function simgGrid($src,$gridX=5,$gridY=2,$marg=0,$attr=null, $no_cache = false){
        
        $size = getimagesize($src);
        
        $style = array(
            "width" => ($size[0]+$marg*$gridX)."px",
            "height"=> ($size[1]+$marg*$gridY)."px"
            );
        
        $style = self::cssStyle($style);
        
        
        echo '<div class="view" style="'.$style.'">';
       // echo '<div class="view-back">TIREOGJRKEKLFEVKLR EZV VJREKZVH</div>';
for ($iy=1;$iy<=$gridY;$iy++){
            for ($ix=1;$ix<=$gridX;$ix++){
                
                    self::simgGridBlock($src,$ix,$iy,$gridX,$gridY,$marg);
                }
            }

        echo '</div>';
        
        
        
    }
    
    
    function simgGridBlock($src,$viewX=1,$viewY=1,$gridX=2,$gridY=1,$marg=0,$attr=null, $no_cache = false){

        $size = getimagesize($src);
        
        $sizeX = $size[0]/$gridX;
        $posX   = "-".$sizeX*($viewX-1);
        
        $sizeY = $size[1]/$gridY;
        $posY   = "-".$sizeY*($viewY-1);
        
        $style = array(
            "background-image"  => "url(".$src.")",
            "background-position-x"=>$posX."px",
            "background-position-y"=>$posY."px",
            "margin-right"  => $marg."px",
            "margin-bottom"  => $marg."px",
            "width" => $sizeX-$marg."px",
            "height"=> $sizeY-$marg."px"
            );
        
        $attr["style"] = self::cssStyle($style);
        
        $class  = "simgCrop";
        $class  .= " s".$viewX;
        $class  .= " grid_".$gridX."x".$gridY;
        $class  .= " view_".$viewX."x".$viewY;
        
        //echo "<span class='green-light'>".$attr["style"]."</span>";

        
        echo self::spacer($class,$attr);
        
        
        
    }
    
    
    
    
    
    
}
?>
