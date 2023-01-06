<?php

session_start();
?>

<link rel="stylesheet" href="style.css">

<?php

if(isset($_GET['id'])){

        // On se connecte à MySQL
$db_infos = new PDO ('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
$db_act = new PDO ('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

// On récupère les detailes de film
$requ_infos = $db_infos->prepare('SELECT f.nom_film AS nf , f.date_sortie AS dtf, f.duree AS duf, f.image AS imgf
FROM film f
WHERE f.id_film ='. $_GET['id']);

$requ_infos->execute();

$liste_infos = $requ_infos->fetchALL();


$requ_act = $db_act->prepare('SELECT p.nom_personne AS np, p.prenom_personne AS pp , r.nom_role AS rf
FROM personne p , acteur a, role r , jouer j, film f
WHERE p.id_personnage = a.id_personnage
AND j.id_film = f.id_film
AND j.id_role = r.id_role
AND j.id_acteur = a.id_acteur
AND f.id_film ='. $_GET['id']);

$requ_act->execute();

$liste_acts = $requ_act->fetchALL();

?>

<?php
    foreach($liste_infos as $info)
    {
    ?>
<p>
    <img src="<?php echo $info['imgf'];?>" id="ph">
    <h1><?php echo $info['nf'];?></h1>
    <label> Date de film : </label> <input type="text" value="<?php echo $info['dtf']; ?>"> <br><br>
    <label> Durée de film : </label> <input type="text" value="<?php echo $info['duf']; echo " min" ?>"> 

    <?php
    }
    ?>

<h3>Casting :</h3>
<table>   
    <thead>
            <tr>
                
                <th> Nom d'acteur </th>
                <th> prenom d'acteur </th>
                <th> Role </th>
               
            </tr>
    </thead>
    <tbody>

    <?php
    foreach($liste_acts as $acteur)
    {
    ?>
   <tr>
           
            <td> <?php echo $acteur['np']; ?> </td>
            <td> <?php echo $acteur['pp']; ?> </td>
            <td> <?php echo $acteur['rf']; ?> </td>
        </tr>
   <?php
    }


    ?> 

</p>

<?php
    }
    ?>


