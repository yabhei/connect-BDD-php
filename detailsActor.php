<?php

session_start();
?>

<link rel="stylesheet" href="style.css">

<?php

if (isset($_GET['id'])) {

    // On se connecte à MySQL
    $db_infos = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

    $requ_infos = $db_infos->prepare('SELECT p.fname_person AS fp , p.lname_person AS lp , p.sex_person AS sp, p.birthday_person AS bp , p.image AS ip
    FROM person p , actor a
    WHERE  a.id_person = p.id_person
    AND p.id_person =' . $_GET['id']);

    $requ_infos->execute();
    $acts_infos = $requ_infos->fetchALL();

    foreach($acts_infos as $act_det){
        ?>
        <p>
    <img src="<?php echo $act_det['ip'];?>" id="ph">
    <h1><?php echo $act_det['fp']; echo $act_det['lp']; ?></h1>
    <label> SEX : </label> <label ><?php echo $act_det['sp']; ?></label> <br><br>
    <label> Birthday : </label> <label ><?php echo $act_det['bp']; ?></label>

    <?php
    }
    ?>
    
<?php
}
?>