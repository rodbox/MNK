<?php
form::postInExec("contact_search");

form::text("search");
form::submit("send", "rechercher");
form::formOut();
?>
<?php $count = count($d); ?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Pseudo</th>
            <th>Demande</th>
        </tr>
    </thead>
    <tbody>   
        <?php if (($count != 0)): ?>
            <?php foreach ($d as $key => $value): ?>
                <tr>
                    <td><?php echo $value['user_First'];?> <?php echo $value['user_Last'];?></td>
                    <td><?php echo $value['user_User'];?></td>
                    <td><?php mnk::linkExecLive("user_contact_lnk",array("id"=>$value['user_ID']),"ajouter");?></td>
                </tr>  <?php endforeach; ?>
        <?php else: ?>
            <tr><td>AUCUN COMMENTAIRE</td></tr>
        <?php endif; ?>   
    </tbody>
</table>