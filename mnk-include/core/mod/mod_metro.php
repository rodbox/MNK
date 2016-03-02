<?php
class metro extends mnk{

function portletIn($title,$icon,$color="dark"){

    $data = array(
                "title"     =>$title,
                "icon"      =>$icon,
                "color"     =>$color
            );


         mnk::iview("metro:portlet-in","",$data);

    }
    function portletLightIn($color){
        echo '<div class="portlet box '.$color.'">
            <div class="portlet-body">';
    }
    function portletOut(){
             mnk::iview("metro:portlet-out");
    }
    

    function portlet($title,$icon,$color="dark",$view_file_name,$model_file_name = null,$data=null,$paginate=null){

        self::portletIn($title,$icon,$color);
        self::iview($view_file_name,$model_file_name,$data,$paginate);
        self::portletOut();

    }

    function portletLight($color="dark",$view_file_name,$model_file_name = null,$data=null,$ingrid=false,$paginate=null){

        if($ingrid){
            self::portletLightIn($color);
            echo "<div class='ingrid'>";
            self::iview($view_file_name,$model_file_name,$data,$paginate);
            echo "</div>";
            self::portletOut();
        }
        else {
            self::portletLightIn($color);
            self::iview($view_file_name,$model_file_name,$data,$paginate);
            self::portletOut();
        }
    }




    function modalLink($id,$content,$data=null,$attr=null){
        $metaAttr =  array(
             "data-toggle"=>"modal",
             "role"=>"button"
            );
        $attr = ($attr!=null)?array_merge($attr,$metaAttr):$metaAttr;
        mnk::ilink("#:".$id,$content,$data,$attr);
    }

    function modalLinkRound($id,$icon,$title,$color="silver",$data=null,$attr=null){
        $metaAttr =  array(
             "data-toggle"=>"modal",
             "role"=>"button",
             "class"=>"big-round bg-".$color
            );
        $content = ui::rimg($icon,32,"fff",array("class"=>"alpha_4"));
        // $content .= "<span class='modal'>".$title."</span>";


        $attr = ($attr!=null)?array_merge($attr,$metaAttr):$metaAttr;
        mnk::ilink("#:".$id,$content,$data,$attr);
    }    

    function modalLinkMini($id,$icon,$title,$color="fff",$data=null,$attr=null){
        $metaAttr =  array(
             "data-toggle"=>"modal",
             "role"=>"button",
             "class"=>"modal-mini bg-".$color
            );
        $content = ui::rimg($icon,16,"fff",array("class"=>"alpha_5"));
        $content .= "<span class='modal-title-link'>".$title."</span>";


        $attr = ($attr!=null)?array_merge($attr,$metaAttr):$metaAttr;
        mnk::ilink("#:".$id,$content,$data,$attr);
    }

    function modalLinkNormal($id,$icon,$title,$color="dark",$data=null,$attr=null){
        $metaAttr =  array(
             "data-toggle"=>"modal",
             "role"=>"button",
             "class"=>"c-".$color
            );
        $content = ui::rimg($icon,32,"242424");
        $content .= " ".$tile;
        // $content .= "<span class='modal'>".$title."</span>";


        $attr = ($attr!=null)?array_merge($attr,$metaAttr):$metaAttr;
        mnk::ilink("#:".$id,$content,$data,$attr);
    }


    function modal($id,$title,$view_file_name,$model_file_name = null,$data=null,$paginate=null){
        $data = array(
                "title"     =>$title,
                "id"        =>$id,
                "color"     =>$color
            );

        mnk::iview("metro:modal-in","",$data);

      //  echo $modalDialogIn;
        mnk::iview($view_file_name,$model_file_name,$data,$paginate);
        echo '</div></div>';


    }


    function tile($title,$number,$content,$color,$class){
        $data = array(
                "title"     =>$title,
                "number"    =>$number,
                "content"   =>$content,
                "color"     =>$color,
                "class"     =>$class
            );
        mnk::iview("metro:tile","",$data);
    }


    function tab($data="",$class=""){
        mnk::iview("metro:tabs","",$data);
    }

    function sideRight($id,$icon,$color,$view_file_name,$model_file_name = null){
        $data = array(
                "icon"      =>$icon,
                "id"        =>$id,
                "view"      =>$view_file_name,
                "model"     =>$model_file_name,
                "color"     =>$color,
                "class"     =>$class
            );
        mnk::iview("metro:side_right","",$data);
    }

}



?>