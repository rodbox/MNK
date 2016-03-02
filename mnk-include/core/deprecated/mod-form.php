mnk-form

<?php 
static function formIn    ($action,$attr=null){
        $attribute = parent::attr($attr);
        $form = '<form action="'.$action.'" enctype="multipart/form-data" '.$attribute.'>';

        echo $form;
    }
    
    static function postIn($action,$attr=null){
        $attrPost = array("method"=>"POST");
        $attr = (is_array($attr))?array_merge($attr,$attrPost):$attrPost;
        
        self::formIn($action,$attr);
    }
    
    static function postInExec($exec,$data=null,$attr=null){
        $dataExec = array("exec"=>$exec);
        $dataMerge = ($data!=null)?array_merge($data,$dataExec):$dataExec;
        $data   = parent::paramLink($dataMerge);
        $action = WEB_ROOT."/mnk-include/exec.php?".$data;     
        self::postIn($action,$attr);
    }
    
    static function postInExecLive($exec,$data=null,$attr=null){
       
        
        $attrLive   = array("class"=>" mnk-live ");
        $attr   = ($attr!=null&&is_array($attr))?self::arrayMergeValue($attr,$attrLive):$attrLive;
      
        self::postInExec($exec,$data,$attr);
    }

 ?>