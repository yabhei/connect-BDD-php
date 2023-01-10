<?php
session_start();
?>

<link rel="stylesheet" href="style.css">
<?php
try
{
        // On se connecte à MySQL
	$db = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
// En cas d'erreur, on affiche un message et on arrête tout
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// On récupère les noms des film, date_sortie et les nom des realisateurs...
$filminfo = $db->prepare('SELECT f.id_film AS id, f.title_film AS nf , f.year_film AS  df , p.lname_person AS nr , p.fname_person AS pr
FROM person p , film f, director r
WHERE p.id_person = r.id_director
AND r.id_director = f.id_director ');

$filminfo ->execute();

$listfilm = $filminfo ->fetchAll();
?>
<!-- on crée  table pour afficher les information -->
<table>           <thead>
                        <tr>
                            <th  >Nom de film</th>
                            <th >Date de sortie</th>
                            <th > ID de realisateur</th>
                        </tr>
                    </thead>
                <tbody>

                        <?php   
                        foreach ($listfilm  as $film) {
                        ?>
            
                        <tr>
                            <td  > <a href="detailsFilm.php?id=<?php echo $film['id'] ?>" target="_blank"><?php echo $film['nf'];?></a> </td>
                            <td  ><?php echo $film['df'];?></td>
                             <td ><?php echo  $film['nr'];echo " ";echo  $film['pr'];?></td>
                        </tr>
                   

               
            
        <?php
        }
        ?>
                </tbody>
</table>


