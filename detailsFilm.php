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
$requ_infos = $db_infos->prepare('SELECT f.title_film AS nf , f.year_film AS dtf, f.duration_film AS duf, f.image AS imgf
FROM film f
WHERE f.id_film ='. $_GET['id']);

$requ_infos->execute();

$liste_infos = $requ_infos->fetchALL();


$requ_act = $db_act->prepare('SELECT p.id_person AS idp ,p.lname_person AS np, p.fname_person AS pp , r.name_role AS rf
FROM person p , actor a, role r , play j, film f
WHERE p.id_person = a.id_person
AND j.id_film = f.id_film
AND j.id_role = r.id_role
AND j.id_actor = a.id_actor
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
    <label> Date de film : </label> <label ><?php echo $info['dtf']; ?></label> <br><br>
    <label> Durée de film : </label> <label><?php echo $info['duf']; echo " min" ?></label>

    <?php
    }
    ?>

<h3>Casting :</h3>
<table>   
    <thead>
            <tr>
                
                <th> Nom d'actor </th>
                <th> prenom d'actor </th>
                <th> Role </th>
               
            </tr>
    </thead>
    <tbody>

    <?php
    foreach($liste_acts as $actor)
    {
    ?>
   <tr>
           
            <td><a href="detailsActor.php?id=<?php echo $actor['idp'] ?>" target="_blank"><?php echo $actor['np']; ?></a> </td>
            <td><a href="detailsActor.php?id=<?php echo $actor['idp'] ?>" target="_blank"> <?php echo $actor['pp']; ?></a> </td>
            <td><?php echo $actor['rf']; ?> </td>
        </tr>
   <?php
    }


    ?> 

</p>

<?php
    }
    ?>


