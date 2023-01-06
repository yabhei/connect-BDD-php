<link rel="stylesheet" href="style.css">

<?php

$db_act = new PDO ('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

$requ_act = $db_act->prepare('SELECT p.nom_personne AS np, p.prenom_personne AS pp
FROM personne p 
INNER JOIN acteur a ON a.id_personnage = p.id_personnage');

$requ_act->execute();

$liste_acts = $requ_act->fetchALL();
?>
<table>
    <thead>
            <tr>
                <th> Nom d'acteur </th>
                <th> Prenom d'acteur </th>
            </tr>
    </thead>
    <tbody>
        <?php
    foreach($liste_acts as $acteur)
{
    ?>
    <tr>
            <td> <?php echo $acteur['np']; ?> </td>
            <td> <?php echo $acteur['pp']; ?>   </td>
        </tr>
   <?php
}


?>

    </tbody>
</table>