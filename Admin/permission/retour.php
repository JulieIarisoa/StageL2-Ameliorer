<?php
    //connection à la base de données
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');

    // recuperation de l'id dans le lien
    $id = $_GET['id'];
    date_default_timezone_set('Indian/Antananarivo');
    $heure=date('H:i:s');

    //requete de retour
    $req= mysqli_query($db,"UPDATE permission SET heure_retour='$heure' WHERE id_permission='$id'");

    //miverina any @ page index.php
    header("Location:http://localhost/amelioration/Admin/permission/liste.php");
?>