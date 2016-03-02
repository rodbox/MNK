mod-admin

<?php 
################################################
    /* chooseInc Link Editor  */
    ################################################

    function rlinkInc($inc, $data = null, $content = null, $attr = null) {
        //$inc    = implode(";",$inc);
        $data = self::paramLink($data);
        $href = WEB_ADMIN . "/index.php?page=" . $inc . "&" . $data;
        return self::sLink($href, $content, $attr);
    }

    function linkPage($page, $data = null, $content = null, $attr = null) {
        echo self::rlinkInc($page, $data, $content, $attr);
    }

    function linkPageLive($page, $data = null, $content = null, $attr = null) {
        $page = explode(" ", $page);
        if (isset($page[1])) {
            $attrLive = array("class" => " mnk-live ", "rel" => $page[1]);
        } else {
            $attrLive = array("class" => " mnk-live ");
        }

        $attr = self::arrayMergeValue($attr, $attrLive);

        self::linkPage($page[0], $data, $content, $attr);
    }

    function linkExec($exec, $data = null, $content = null, $attr = null) {
        $dataExec = array("exec" => $exec);
        $data = self::arrayMergeValue($data, $dataExec);
        $data = self::paramLink($data);
        $href = WEB_ADMIN . "/exec.php?" . $data;
        echo self::sLink($href, $content, $attr);
    }

    function linkExecLive($exec, $data = null, $content = null, $attr = null) {
        $attrLive = array("class" => " mnk-live-exec");
        $attr = self::arrayMergeValue($attr, $attrLive);

        self::linkExec($exec, $data, $content, $attr);
    }

    function linkViewLive($view_file_name, $model_file_name = null, $dataSend = null, $content = null, $attr = null) {

        $data = self::paramLink($dataSend);




        $view_file_name = explode(" ", $view_file_name);
        if (isset($view_file_name[1])) {
            $attrLive = array("class" => " mnk-live ", "rel" => $view_file_name[1]);
        } else {
            $attrLive = array("class" => " mnk-live ");
        }

        $attr = self::arrayMergeValue($attr, $attrLive);
        $href = WEB_ADMIN . "/viewer.php?view=" . $view_file_name[0] . "&model=" . $model_file_name . "&" . $data;
        echo self::sLink($href, $content, $attr);
    }
    

 ?>