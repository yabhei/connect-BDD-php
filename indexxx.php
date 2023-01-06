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
$filminfo = $db->prepare('SELECT f.nom_film AS nf , f.date_sortie AS  df , p.nom_personne AS nr , p.prenom_personne AS pr
FROM personne p , film f, realisateur r
WHERE p.id_personnage = r.id_realisateur
AND r.id_realisateur = f.id_realisateur ');

$filminfo ->execute();

$listfilm = $filminfo ->fetchAll();
?>
<table>
                    <thead>
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
                            <td  ><?php echo $film['nf'];?></td>
                            <td  ><?php echo $film['df'];?></td>
                             <td ><?php echo  $film['nr'];echo " ";echo  $film['pr'];?></td>
                        </tr>
                   

               
            
        <?php
        }
        ?>
                </tbody>
</table>


