<?php
mnk::mod_load("controller");

class page extends Controller{

    const curLang = "FR";
    
    var $title;
    var $content;
    var $src;
    /*
     * 1. ID
     * 2. DB
     * 3. Inc
     * 4. View
     * 5. Pack / Method
     */

    
function pHeader($pID, $data="") {
        $data = ($data != "") ? "&" . $data : "";
        header("location:" . WEB_ROOT . "/index.php?p=" . $pID . $data);
    }
function chooseInc($pID='', $dataGet='') {
        //$_SESSION['curLang'] = (!isset($_SESSION['curLang'])) ? self::curLang : $_SESSION['curLang'];
        if (!empty($pID))
            $pID = $pID;
        elseif (isset($_GET['p']) && empty($pID))
            $pID = $_GET['p'];
        else
            $pID = HOME_ID;

        if ($pID != 0) {

            $p['from'] = "mnk_page";
            $p['where'] = "page_ID = '" . $pID . "'";
            $r = mnk::reqSlt($p);

            if ($r->rowCount() > 0) {
                $d = $r->fetch(PDO::FETCH_OBJ);

                switch ($d->page_Src) {
                    case 1 :
                        $p2['from'] = "mnk_page_content";
                        $p2['where'] = "page_ID = '" . $pID . "' AND page_Lang = '" . $_SESSION['curLang'] . "'";
                        $r2 = mnk::reqSlt($p2);
                        $d2 = $r2->fetchAll();
                        //mnk::dataVar($d2);
                        echo stripcslashes($d2[0]['page_Content']);
                        break;
                    case 2 :
                        $fileDir = DIR_PAGE_INC . "/" . $_SESSION['curLang'] . "/" . $d->page_File;
                        include (is_file($fileDir)) ? $fileDir : ERROR_PAGE;
                        break;
                    case 3 :
                        mnk::loadControl($d->page_Cont);
                        $cont = new $d->page_Cont;
                        $meth = strval($d->page_Meth);
                        $cont->$meth();
                        break;
                    case 4 :
                        $fileDir = PACK . "/" . $pack . "/" . self::power . "/pages/" . $page_File;
                        include (is_file($fileDir)) ? $fileDir : ERROR_PAGE;
                        break;
                    default :
                        include (ERROR_PAGE);
                }
            } else {
                include (ERROR_PAGE);
            }
        } elseif ($pID == 0) {
            include(LOADER_CONTROL_ABS);
        } else {
            include (DEFAULT_PAGE);
        }
    }
    
    
    function paginate($nbT,$pagMax=10) {
        if ($nbT > 1) {
            $curLink = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];

            echo '<div class="pagin">';

            if ($page > 1) {
                mnk::speedLink($this->urlParamManag($curLink, array("page" => 1)), "|<", "", "pagin_first");
                mnk::speedLink($this->urlParamManag($curLink, array("page" => $page - 1)), "<", "", "pagin_prev");
            }
            $pagMax = ($nbT < $pagMax)?$nbT:$pagMax;

            $start = $page - $pagMax / 2;
            $pageStart = ($start > 1) ? $start : 1;

            $pageStop = $page + $pagMax / 2;

            $pageStart = ($pageStop >= $nbT) ? $nbT - $pagMax : $pageStart;
            $pageStop = ($pageStart <= 1) ? $pagMax : $pageStop;

            $start = (($page > $pagMax / 2) && $pageStart >= 1) ? $pageStart : 1;
            $stop = ($page + $pagMax / 2 < $nbT) ? $pageStop : $nbT;

            for ($i = $start; $i <= $stop; $i++) {
                mnk::speedLink($this->urlParamManag($curLink, array("page" => $i)), $i, "", ($i == $page) ? "cur" : "");
            }



            if ($page != $nbT) {
                mnk::speedLink($this->urlParamManag($curLink, array("page" => $page + 1)), ">", "", "pagin_next");
                mnk::speedLink($this->urlParamManag($curLink, array("page" => $nbT)), ">|", "", "pagin_last");
            }
            //ferme les balises de paginIn()
            echo '<div class="small"><center> <strong>' . $page . '</strong>/' . $nbT . '</center></div>';

            echo '</div>';
        }
    }
    
    function pLink($p, $content, $attr=null) {
        echo self::rpLink($p, $content, $attr);
    }

    function pFrontLink($p, $content, $attr=null) {
        $url = WEB_ROOT . "/index.ph?p=" . $p;
        $href = 'href="' . htmlspecialchars($url) . '"';

        $link = '<a ' . $href . ' ' . $attribute . '>' . $content . '</a>';
        echo $link;
    }
      /*
     * function step
     * @param $nb // nb d'etape
     * @param $cur // etape en cour
     * @param $title // array contenant la liste des titres de chaque etape 
     */

    function step($nb, $cur, $title="") {
        $step = '<div class="follow_step"><ul>';
        for ($i = 1; $i <= $nb; $i++) {
            $classCur = ($i == $cur) ? 'step_cur' : '';
            $classCheck = ($i < $cur) ? 'step_check' : '';
            $step .= '<li class="' . $classCur . ' ' . $classCheck . '"><div>' . $i . '</div>';
            $step .= (is_array($title)) ? '<p>' . $title[$i - 1] . '</p>' : "";
            $step .= '</li>';
        }
        $step .='</ul></div>';
        echo $step;
    }
    
    function adminLink(){
        $url = WEB_ROOT."/mnk-admin/";
        $href = 'href="' . $url . '"';
        $link = '<a ' . $href . '>admin</a>';
        echo $link;
    }
}
?>
