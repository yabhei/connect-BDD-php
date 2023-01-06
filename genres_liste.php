<link rel="stylesheet" href="style.css">

<?php
// On se connecte à MySQL
$db_genre = new PDO ('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les genres
$requ_genre = $db_genre->prepare('SELECT libelle FROM genre ');

$requ_genre->execute();

$liste_genre = $requ_genre->fetchALL();
?>

<!-- on crée une table pour afficher les information -->
<table>
    <thead>
            <tr>
                <th>Les genres des films </th>
                
            </tr>
    </thead>
    <tbody>
        <?php
    foreach($liste_genre as $genre)
{
    ?>
    <tr>
            <td> <?php echo $genre['libelle']; ?> </td>
            
        </tr>
   <?php
}


?>

    </tbody>
</table>