<?php 

/*mnk core*/
function rlinkInc($inc,$data=null,$content=null,$attr=null){
        //$inc    = implode(";",$inc);
        $data   = self::paramLink($data);
        $href = WEB_ROOT."/index.php?page=".$inc."&".$data;
        return self::sLink($href,$content,$attr);
    }
    function linkPage($page,$data=null,$content=null,$attr=null){
        echo self::rlinkInc($page,$data,$content,$attr);
    }
    
    function linkPageLive($page,$data=null,$content=null,$attr=null){
        
        $page = explode(" ",$page);
        
        if(isset($page[1])){
            $attrLive   = array("class"=>" mnk-live ", "rel" => $page[1]);
        }
        else{
            $attrLive   = array("class"=>" mnk-live ");
        }
        //debug::dataVar($page);
        
        
        $attr   = self::arrayMergeValue($attr,$attrLive);
        
        self::linkPage($page[0],$data,$content,$attr);
    }
    
    function linkExec($exec,$data=null,$content=null,$attr=null){
        $dataExec   = array("exec"=>$exec);
        $data       = self::arrayMergeValue($data,$dataExec);
        $data       = self::paramLink($data);
        $href       = WEB_ROOT."/mnk-include/exec.php?".$data;
        echo self::sLink($href,$content,$attr);  
    }

    function linkExecLive($exec,$data=null,$content=null,$attr=null){
        $attrLive   = array("class"=>" mnk-live-exec");
        $attr   = self::arrayMergeValue($attr,$attrLive);
        
        self::linkExec($exec,$data,$content,$attr);
    }
    
    
    
    
    function linkExecSwich($exec,$data=null,$statut=true){
        $switch_statut = ($statut)?"toggle-switch-on":"toggle-switch-off";

        $attr= array("class"=>"toggle-switch ".$switch_statut);
       self::linkExec($exec,$data,mnk::spacer("toggle-switch"),$attr);
      // self::linkExec($exec_2,$data,mnk::spacer("ui-toggle-off"),$attr);
       
    }
    
    
    /*
     * function sLink
     * @param $href
     * @param $content
     * @param $attr

     */
    function sLink($href, $content=null, $attr=null) {

        $href = htmlspecialchars($href);
        $attribute = self::attr($attr);
        
        if ($content!=null)
            $a = '<a href="' . $href . '" ' . $attribute . '>' . $content . '</a>';
        else
            $a = '<a href="' . $href . '" ' . $attribute . '>';
        
        return $a;
    }
 ?>