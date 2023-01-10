<link rel="stylesheet" href="style.css">

<?php
// On se connecte à MySQL
$db_category = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les categorys
$requ_category = $db_category->prepare('SELECT name_category FROM category ');

$requ_category->execute();

$liste_category = $requ_category->fetchALL();
?>

<!-- on crée une table pour afficher les information -->
<table>
    <thead>
        <tr>
            <th>Les categorys des films </th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($liste_category as $category) {
            ?>
            <tr>
                <td> <?php echo $category['name_category']; ?> </td>

            </tr>
            <?php
        }


        ?>

    </tbody>
</table>