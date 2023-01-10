<link rel="stylesheet" href="style.css">

<?php
// On se connecte à MySQL
$db_real = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les director
$requ_real = $db_real->prepare('SELECT p.lname_person AS np, p.fname_person AS pp
FROM person p 
INNER JOIN director r ON r.id_person = p.id_person');

$requ_real->execute();

$liste_real = $requ_real->fetchALL();
?>

<!-- on crée une table pour afficher les information -->
<table>
    <thead>
        <tr>
            <th> Nom de director </th>
            <th> Prenom de director </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($liste_real as $director) {
            ?>
            <tr>
                <td> <?php echo $director['np']; ?> </td>
                <td>
                    <?php echo $director['pp']; ?>
                </td>
            </tr>
            <?php
        }


        ?>

    </tbody>
</table>