<?php

class form extends mnk{
function form(){
        parent::evalSession();
        
    }
    
    static function contAction($pack, $method,$data=null) {
        $data	= ($data!="")?"&".$data:"";
        $action = LOADER_CONTROL."?c=".$pack."&m=".$method.$data;
        return $action;
        
    }
    
    

    static function attr     ($attr,$req=null) {
        $r = "";
        
        //echo array_keys($attr);

        $attr['class']  .= ($req==true)?" required":"";
        
        if (is_array($attr)) {
            foreach ($attr as $key => $val)
                $r.= ' ' . $key . '="' . $val . '" ';
        }
        return $r;
    }
   
    function iform ($dataAction,$method = "POST",$data=null,$attr=null){
        $metaForm   = explode(" ",$dataAction);
        $dataAction = explode(":",$metaForm[0]);
        
        // echo $dataAction[1];

        $actionType = array(
            "exec"      => WEB_INCLUDE.'/exec.php?exec='.$dataAction[1]."&type=classic&",
            "a-exec"    => WEB_ADMIN.'/exec.php?exec='.$dataAction[1]."&type=classic&",
            "a-test"    => WEB_ADMIN.'/exec.php?exec='.$dataAction[1]."&type=test&",
            "pack-exec" => WEB_INCLUDE.'/exec.php?exec='.$dataAction[1]."&type=pack-exec&",
            "pack-page" => WEB_ROOT.'/index.php?page='.$dataAction[1]."&type=pack-page&",
            "null"      => "#"
            );
        
            $action     = $actionType[$dataAction[0]];
        

        $href       = $metaHref[$typeHref];

        $class      = explode (".",$metaForm[1]);
        $id         = str_replace("#","",array_shift($class));
        
        $class      = implode(" ",$class);
        $attr_ilink = array("method"=>$method, "class"=>$class);

        //$attr       = ($attr!=null)?json_decode($attr,true):null;
        $attr       = ($attr!=null)?mnk::arrayMergeValue($attr,$attr_ilink):$attr_ilink;
        $attr       = mnk::attr($attr);
        // $data       = ($data!=null)?json_decode($data,true):null;
        $data       = ($data!=null)?mnk::paramLink($data):"";


        if ($content==null)
            echo '<form action="'.htmlspecialchars($action.$data).'" id="'.$id.'"  '.$attr.'>';
    } 
    
    
    
    
    
    
    
    static function label($label=null,$name=null,$req=null){
        if($label!=null){
            $for    = ($name!=null)?'for="'.$name.'"':null;
            $req    = ($req!=null)?'<span class="oblig">*</span>':null;
            $label = '<label '.$for.'> ' . $label.' '.$req.'</label>';
            
            echo $label;
        }
        
    }
   
    
    static function formOut(){   
        echo '</form>';
      
    }

    
    /*
     * function fselect
     * @param $opt
     * @param $name
     * @param $id
     * @param $label
     */
    static function select($name,$opt,$label=null,$sel=null,$attr=null){
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $option = form::selectLoop($opt,$sel);
        $attribute = form::attr($attr,$req);
        $select = '<select '. $attribute . ' name ="'.$name.'">'.$option.'</select>';
        self::label($label,$name,$req);
        echo $select;
    }
    
    
    static function selectLoop($data_array,$sel=null){
        $sel	= ($sel!=null)?$sel:"";
        $option	= "";
       foreach ($data_array as $key => $val){
            
            if(!is_array($val)){
                $selected   = ($key==$sel)?" selected='selected' ":"";
                $val        = ($val=="")?'&nbsp;':$val;
                $option     .= "<option " . $selected . " value='".$key."'>".$val."</option>";
            }
            else {
                $option     .= "<optgroup label='".$val['name']."'>";
                foreach ($val as $key2 => $val2){
                    if($key2!="name"){
                        $option     .= form::selectLoop(array($key2=>$val2),$sel);
                    }
                }
                $option     .= "</optgroup>";
            }
        } 
        
        return $option;
    }
    
    
    
     /*
     * function fcheck
     * @param $opt
     * @param $attr
     * @param $label
     * @param $chk
     * @param $req
     */
    static function check($name,$label=null,$value=null,$chk=null,$attr=null){
        
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $checked	    = ($chk==true)?' checked="checked" ':"";
        $attribute  = form::attr($attr);

        $checkBox   = '<input type="checkbox" name="'.$name.'" '.$checked.' value="'.$value.'" '. $attribute . '/>';

        self::label($label,$name,$req);
        echo $checkBox;     
    }
   





    
    
     /*
     * function text
     * @param $value
     * @param $name : si le champ est requis rajouter un espace puis la mention "req".
     * @param $id
     * @param $label
     */
    static function text($name,$label=null,$value=null,$attr=null){
        //$eval      = form::eval_error($name);
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $value      = ($value=="")?@$_SESSION[$attr['name']]:$value;  
        $attribute  = form::attr($attr,$req);
        $text       = '<input type="text" name="'.$name.'" value="'.$value.'" '. $attribute.' />';
        self::label($label,$name,$req);
        echo $text;
    }

    /*
     * function text
     * @param $value
     * @param $name : si le champ est requis rajouter un espace puis la mention "req".
     * @param $id
     * @param $label
     */
    static function textIco($name,$ico,$label=null,$value=null,$attr=null){
        //$eval      = form::eval_error($name);

        $dir_svg = WEB_STATIC."/img/ui/Ultimate/Icons/SVG/";
      $dir_file = $dir_svg.$ico.'.svg';
      $css = "background-image : url('".$dir_file."'); ";


        $attr = array("class"=>"input-ico placeholder-no-fix",
            "style"=> $css,
            "placeholder"=>$label);

        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $value      = ($value=="")?@$_SESSION[$attr['name']]:$value;  
        $attribute  = form::attr($attr,$req);
        $text       = '<input type="text" name="'.$name.'" value="'.$value.'" '. $attribute.' />';
        //self::label($label,$name,$req);
        echo $text;
    }

  static function textNum($name,$label=null,$value=null,$attr=null,$bg="4",$color="c-1"){
        $attr = array("class"=>"range-value num-edit border-".$bg,"for"=>$name);
        echo "<span class='input-bt-num'>";
        self::text($name."-value",$label,$value,$attr);
        echo "<span class='bt-num'>";
        echo "<a href='#' class='bt-num-plus bg-".$bg." ".$color."' for='".$name."'>+</a>";
        echo "<a href='#' class='bt-num-moins bg-".$bg." ".$color."' for='".$name."'>-</a>";
        echo "</span>";
        echo "</span>";
    }

    static function range($name,$label=null,$value=null,$min=0,$max=100,$attr=null){
        //$eval      = form::eval_error($name);
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $value      = ($value=="")?@$_SESSION[$attr['name']]:$value;  
        $attribute  = form::attr($attr,$req);
        $range       = '<input type="range" name="'.$name.'" value="'.$value.'" min="'.$min.'" max="'.$max.'" '. $attribute.' />';
        echo "<div class='range-div'>";
        self::label($label,$name,$req);
        echo "<span class='small output-range output-range-min'>".$min."</span> ";
        echo $range;
        echo " <span class='small output-range output-range-max'>".$max."</span> ";
        self::textNum($name,"",$value);
        echo "</div>";
       
    }
    
    
static function toggle($name,$label=null,$value=true,$checked=false,$text1="ON",$text2="OFF",$bg1="12",$bg2="22",$c1="0",$c2="0"){
    if (!$checked || $checked !="1"){
        $class= 'form-toggle-off';
        $checked = "";
    }
    else {
        $class= '';
        $checked = " checked='checked' ";
    };
   self::label($label,$name);
echo '<div class="form-toggle">
    <div class="form-toggle-slide '.$class.'">
        <input type="checkbox" name="'.$name.'" value="'.$value.'" '.$checked.'/>
        <div class="on form-toggle-value bg-'.$bg1.' c-'.$c1.'">'.$text1.'</div><div class="off form-toggle-value bg-'.$bg2.' c-'.$c2.'">'.$text2.'</div>
    </div>
</div>';
}



    static function metaName($name){
        $meta       = explode(" ",$name);
        return $meta;
    }
    
    
    static function textExec($exec,$name,$label=null,$value=null,$data=null,$attr=null){

//        $attr   = mnk::arrayMergeValue($attr,$attrLive);

        self::iform($exec,"POST",$data,array("class"=>"submit-text"));
        self::text($name,$label,"",$attr);
        self::submit("envoyer","envoyer");
        self::formOut();
    }
    
    
    
    
    /*
     * 
     * 
     * 
     * A REVOIR
     * 
     * 
     */
    
    
    
 
    
   

    /*
     * function radio
     * @param $name
     * @param $opt    
     * @param $label
     * @param $chk
     * @param $attr
     * @param $req
     */
    static function radio($name,$opt,$label=null,$chk=null,$attr=null){
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $chk	        = ($chk!=null)      ?$chk:"";
        $attribute      = form::attr($attr,$req);
        $radioList   = "<div class='opt' ". $attribute.">";
        foreach ($opt as $key => $val){
                $checked        = ($chk==$key)?' checked="checked" ':'';
                $radioList   .= '<label><input type="radio" name="'.$name.'" '.$checked.' value="'.$key.'" /><span class="radio_text_'.$key.'">'.$val.'</span></label>';
        }
        $radioList   .= "</div>";
        self::label($label,$name,$req);
        echo $radioList;     
    }

    static function radioLoop(){
        
    }

/*
     * function password
     * @param $value
     * @param $name
     * @param $id
     * @param $label
     */
    static function pw($name,$label=null,$value=null,$attr=null) {
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $attribute  = form::attr($attr,$req);
        $text       = '<input type="password" name="'.$name.'" value="'.$value.'" '. $attribute.' />';
        self::label($label,$name,$req);
        echo $text;
    }/*
     * function password
     * @param $value
     * @param $name
     * @param $id
     * @param $label
     */
    static function pwIco($name,$ico,$label=null,$value=null,$attr=null) {
        $meta       = self::metaName($name);
           $dir_svg = WEB_STATIC."/img/ui/Ultimate/Icons/SVG/";
      $dir_file = $dir_svg.$ico.'.svg';
      $css = "background-image : url('".$dir_file."'); ";


        $attr = array("class"=>"input-ico placeholder-no-fix",
            "style"=> $css,
            "placeholder"=>$label);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        $attribute  = form::attr($attr,$req);
        $text       = '<input type="password" name="'.$name.'" value="'.$value.'" '. $attribute.' />';
        // self::label($label,$name,$req);
        echo $text;
    }



/*
     * function hidden
     * @param $value
     * @param $name
     * @param $attr
     */
    static function hidden($value,$name,$attr=null){
        $attribute  = form::attr($attr);
        $hidden     = '<input type="hidden" name="'.$name.'"  value="'.$value.'" '. $attribute.' />';

        echo $hidden;
    }




    /*
     * function textarea
     * @param $name
     * @param $label
     * @param $value
     * @param $attr
     * @param $req
     */
    static function tinyMCE($name,$label=null,$value=null,$attr=null){

        
        if($attr!=null){
            if(array_key_exists('class',$attr))
                    $attr['class'] .= " tinymce ";
            else
                    $attr['class'] = " tinymce ";
         }
         
         else
             $attr['class'] = " tinymce ";
        
        self::textarea($name,$label,$value,$attr);
    }
    
    
     /*
     * function textarea
     * @param $name
     * @param $label
     * @param $value
     * @param $attr
     * @param $req
     */
    static function textarea($name,$label=null,$value=null,$attr=null){
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
        
        
        $attribute  = form::attr($attr,$req);
        $text       = '<textarea name="'.$name.'" '. $attribute . '>'.$value.'</textarea>';
        self::label($label,$name,$req);
        echo $text;
    }


    static function textareaExec($exec,$name,$label=null,$value=null,$data=null,$attr=null){

//        $attr   = mnk::arrayMergeValue($attr,$attrLive);

        self::iform($exec,"POST",$data,array("class"=>"submit-text"));
        self::textarea($name,$label,$value,$attr);
        self::submit("envoyer","envoyer");
        self::formOut();
    }


    /*
     * function submit
     * @param $value
     * @param $name
     * @param $id
     * @param $attr
     */   
    static function submit($name,$value,$attr=null){
   
        $attribute  = form::attr($attr);
        $submit     = '<input type="submit"  name="'.$name.'"  value="'.$value.'" '. $attribute.' />';

        echo $submit;
    }

    
    /*
     * function button
     * @param $name
     * @param $label
     * @param $value
     * @param $attr
     * @param $req
     */   
    static function button($name,$value,$attr=null){
        $attribute  = form::attr($attr);
        $bt         = '<input type="button" name="'.$name.'"  value="'.$value.'" '. $attribute.' />';

        echo $bt;
    }

    /*
     * function file
     * @param $name
     * @param $value
     * @param $label
     * @param $attr
     * @param $req
     */
    static function file($name,$label=null,$attr=null){
        $meta       = self::metaName($name);
        $name       = $meta[0];
        $req        = ($meta[1]=="req")?true:false;
      
        $attribute  = form::attr($attr);
        $text       = '<input type="file" name="'.$name.'" '. $attribute.' />';
        self::label($label,$name,$req);
        echo $text;
    }

    
    static function selectCountry(){
       $d = mnk::country_List();
        $opt=array(""=>"");
        foreach($d as $val)$opt[$val['code_pays']]=utf8_encode($val['fr']);

        form::select($opt,"pays","pays","Pays","","FR");
    }
    
    static function eval_error($name=""){
		if(isset($_SESSION['form']['error']['empty'])){
        $eval = in_array($name,$_SESSION['form']['error']['empty']);
        $r= array();

        if($eval){
            $r      = array(
                            "msg"   => '<span class="form_error_1">Problème</span>',
                            "error" => "error_1"
                            );
        }
      
        return ($r);
		}
    }
}