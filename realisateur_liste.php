<link rel="stylesheet" href="style.css">

<?php
// On se connecte à MySQL
$db_real = new PDO ('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les realisateur
$requ_real = $db_real->prepare('SELECT p.nom_personne AS np, p.prenom_personne AS pp
FROM personne p 
INNER JOIN realisateur r ON r.id_personnage = p.id_personnage');

$requ_real->execute();

$liste_real = $requ_real->fetchALL();
?>

<!-- on crée une table pour afficher les information -->
<table>
    <thead>
            <tr>
                <th> Nom de realisateur </th>
                <th> Prenom de realisateur </th>
            </tr>
    </thead>
    <tbody>
        <?php
    foreach($liste_real as $realisateur)
{
    ?>
    <tr>
            <td> <?php echo $realisateur['np']; ?> </td>
            <td> <?php echo $realisateur['pp']; ?>   </td>
        </tr>
   <?php
}


?>

    </tbody>
</table>