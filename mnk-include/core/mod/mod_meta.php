<?php
class meta extends mnk{
    function title($id = HOME_ID) {
        $p['from'] = "mnk_page_content";

        $p['where'] = "page_ID = " . $id . " AND page_Lang = 'FR'";

        $p['limit'] = 1;


        $r = mnk::reqSlt($p);

        $d = $r->fetchAll();

        echo stripslashes($d[0]['page_Title']);
    }    function hTitle($id) {

        echo "<h1>";
        mnk::title($id);
        echo "</h1>";
    }
    
    
    function country_List() {

        $p['select'] = "fr,code_pays";
        $p['from'] = "data_geo_pays";

        $r = mnk::reqSlt($p);

        $d = $r->fetchAll();

        return $d;
    }

    function timeValue() {
        $units = array(
            "y" => 29030400, // seconds in a year   (12 months)
            "M" => 2419200, // seconds in a month  (4 weeks)
            "w" => 604800, // seconds in a week   (7 days)
            "d" => 86400, // seconds in a day    (24 hours)
            "h" => 3600, // seconds in an hour  (60 minutes)
            "m" => 60, // seconds in a minute (60 seconds)
            "s" => 1         // 1 second
        );
        return ($units);
    }
}
?>
