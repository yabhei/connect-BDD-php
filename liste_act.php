<link rel="stylesheet" href="style.css">

<?php
// On se connecte à MySQL
$db_act = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les actors
$requ_act = $db_act->prepare('SELECT p.lname_person AS np, p.fname_person AS pp
FROM person p 
INNER JOIN actor a ON a.id_person = p.id_person');

$requ_act->execute();

$liste_acts = $requ_act->fetchALL();
?>

<!-- on crée une table pour afficher les information -->
<table>
    <thead>
        <tr>
            <th> Nom d'actor </th>
            <th> Prenom d'actor </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($liste_acts as $actor) {
            ?>
            <tr>
                <td> <?php echo $actor['np']; ?> </td>
                <td>
                    <?php echo $actor['pp']; ?>
                </td>
            </tr>
            <?php
        }


        ?>

    </tbody>
</table>