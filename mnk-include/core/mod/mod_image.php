<?php
class image extends mnk{
    
    var $file;
    var $image_width;
    var $image_height;
    var $width;
    var $height;
    var $ext;
    var $types = array('','gif','jpeg','png','swf');
    var $quality = 100;
    var $top = 0;
    var $left = 0;
    var $crop = false;
    var $type;
    var $image_upload;
    var $bg_color = array("r"=>255,"g"=>255,"b"=>255);
    
    
    
    /* MES FONCTIONS */


    /* Couplé avec JCROP */
    
    function thumbJcrop($p=null){
        
        $pDefaut = array("suffix"=>"","resize"=>55,"quality"=>80,"x"=>0,"y"=>0,"w"=>100,"h"=>100); 
       
        $p = array_replace($pDefaut,$p);
        
        extract($p);
      
        //$src 		= parent::webtoAbs($img_src);
        
        $thumb      = new image($src);

        $thumb  ->  quality($quality);
        $thumb  ->  crop($x,$y);
        $thumb  ->  width($w);
        $thumb  ->  height($h);
        $thumb  ->  name($thumb->name.$suffix);
        
        $dif    = ($resize/$w)*100;
        
        $thumb  ->  resize ($dif);
        $thumb  ->  save();
    }
 
    function resizeMax($p){
        $pDefaut = array("suffix"=>"","w_max"=>380,"quality"=>80); 
        $p = array_merge($pDefaut,$p);
        extract($p);
        
    
        $img_infos = getimagesize($img_src);
        if ($img_infos[0]>$w_max){
            $dif    = ($w_max/$img_infos[0])*100;
            
            $thumb  =   new image($img_src);
            $thumb  -> quality($quality);
            $thumb  -> name($thumb->name.$suffix);
            $thumb  -> resize ($dif);
            $thumb  -> save();
         /*   
             parent::loadControl('logger');
        
        $report = new logger(array('name'=>'image'));
        $report->logUpd($thumb->file );
        $report->logClose();
	*/
        }
        
       
    }
   
    
    /* FIN JCROP*/
    
    function scanDir($scan_dir=""){
        $scan_dir    = DIR_UPLOAD."/gal/";
       
        $r_scan_dir    = scandir($scan_dir);
        //parent::dataVar($dirScan);
	foreach($r_scan_dir  as $val) {
            $src = $scan_dir.$val;
            $ext = pathinfo($val,PATHINFO_EXTENSION);

               if($ext == "JPG" || $ext == "jpg") {
		$this->cropDir($src);
	    }
	}
    }
    
    function cropDir($img){
        $thumb       = new image($img);
        $thumb->resize(50);

        $thumb->quality(80);
        $thumb->crop(100,50);
        $thumb->width(100);
        $thumb->height(100);
        $thumb->name($thumb->name."_A");
        $thumb->save();
    }
    
    /* FIN DE MES FONCTIONS */
    
    /**/
	function bg_tmp_white($w,$h,$src){
	    $image = imagecreate($w,$h);
	    $blanc  = imagecolorallocate($image, 255, 255, 255);
	    imagejpeg($image,$src);
	}
    /**/
    function image($name='') {
        if ($name!=''){
            $this->file         = $name;
            $info               = getimagesize($name);
            $this->image_width  = $info[0];
            $this->image_height = $info[1];
            $this->type = $this->types[$info[2]];
            $info       = pathinfo($name);
            $this->dir  = $info['dirname'];
            $this->name = str_replace('.'.$info['extension'], '', $info['basename']);
            $this->ext  = $info['extension'];
        }
    }
    
    function dir($dir='') {
        if(!$dir) return $this->dir;
        $this->dir = $dir;
    }
    
    function name($name='') {
        if(!$name) return $this->name;
        $this->name = $name;
    }
    
    function width($width='') {
        $this->width = $width;
    }
    
    function height($height='') {
        $this->height = $height;
    }
    
    function resize($percentage=50) {
        if($this->crop) {
            $this->crop = false;
            $this->width = round($this->width*($percentage/100));
            $this->height = round($this->height*($percentage/100));
            $this->image_width = round($this->width/($percentage/100));
            $this->image_height = round($this->height/($percentage/100));
        } else {
            $this->width = round($this->image_width*($percentage/100));
            $this->height = round($this->image_height*($percentage/100));
        }
        
    }
    
    function crop($top=0, $left=0) {
        $this->crop = true;
        $this->top = $top;
        $this->left = $left;
    }
    
    function quality($quality=80) {
        $this->quality = $quality;
    }
    
    function show() {
        $this->save(true);
    }
    
    function save($show=false) {

        if($show) @header('Content-Type: image/'.$this->type);
        
        if(!$this->width && !$this->height) {
            $this->width = $this->image_width;
            $this->height = $this->image_height;
        } elseif (is_numeric($this->width) && empty($this->height)) {
            $this->height = round($this->width/($this->image_width/$this->image_height));
        } elseif (is_numeric($this->height) && empty($this->width)) {
            $this->width = round($this->height/($this->image_height/$this->image_width));
        } else {
            if($this->width<=$this->height) {
                $height = round($this->width/($this->image_width/$this->image_height));
                if($height!=$this->height) {
                    $percentage = ($this->image_height*100)/$height;
                    $this->image_height = round($this->height*($percentage/100));
                }
            } else {
                $width = round($this->height/($this->image_height/$this->image_width));
                if($width!=$this->width) {
                    $percentage = ($this->image_width*100)/$width;
                    $this->image_width = round($this->width*($percentage/100));
                }
            }
        }
        
        if($this->crop) {
            $this->image_width = $this->width;
            $this->image_height = $this->height;
        }

        if($this->type=='jpeg') $image = imagecreatefromjpeg($this->file);
        if($this->type=='png') $image = imagecreatefrompng($this->file);
        if($this->type=='gif') $image = imagecreatefromgif($this->file);
        
        $new_image = imagecreatetruecolor($this->width, $this->height);
	
	$bg_color = imagecolorallocate($new_image, $this->bg_color["r"], $this->bg_color["g"], $this->bg_color["b"]);
	imagefilledrectangle($new_image, 0, 0, $this->width, $this->height, $bg_color);
	imagecopyresampled($new_image, $image, 0, 0, $this->top, $this->left, $this->width, $this->height, $this->image_width, $this->image_height);
        
        $name = $show ? null: $this->dir.DIRECTORY_SEPARATOR.$this->name.'.'.$this->ext;
        if($this->type=='jpeg') imagejpeg($new_image, $name, $this->quality);
        if($this->type=='png') imagepng($new_image, $name);
        if($this->type=='gif') imagegif($new_image, $name);
        
        imagedestroy($image); 
        imagedestroy($new_image);
    }
    
}

?>