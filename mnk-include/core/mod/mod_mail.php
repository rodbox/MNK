<?php

//envois un mail a partir d'un model html ou text
    function sendMail($p,$reply = true) {
        $dm = $p['dest']['mail'];  //mail du destinataire
        $em = $p['exp']['mail']; // mail de l'expediteur
        $en = $p['exp']['name']; // nom de l'expediteur
        $t = $p['type'];    // HTML ou text
        $content = $p['content'];  // contenue du message
        $o = ucfirst($p['obj']);  //objet du mail
        //$from = "From:$en<$em>\n";
        $from = 'From: "' . $en . '" <';
        $from .= $em;
        $from .= '>' . "\n";

        if($reply)
            $from .=  'Reply-To: ' .$em. "\r\n";


        if ($t == "HTML") {
            $from .= 'Content-Transfer-Encoding: 8bit' . "\n";

            $from .= 'MIME-version: 1.0' . "\n";
            $from .= 'Content-type: text/html; charset= utf8' . "\n";
        }
        else {
            $from .= "MIME-Version: 1.0";
            $from .= "Content-type: text/plain; charset=ISO-8859-1";
        }


        $mail =  mail($dm, $o, $content, $from);
        if($mail)
           echo "envoyé";
  
        // mnk::debug($mail);
    }
?>
