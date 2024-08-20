<?php
    //connectio à la base de données
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');

    //numero personnel sortir
    $id= $_GET['id'];

        //date et heure de sortie
        date_default_timezone_set('Indian/Antananarivo');
        $heure=date('H:i:s');
            
        //requête d'ajout
        $req = mysqli_query($db, "INSERT INTO sortie VALUES (Null, '$id', CURRENT_DATE(),'$heure',CURRENT_DATE(),'$heure')");
        //
        header("Location:liste.php");
?>