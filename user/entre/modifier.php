<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
        <a href="liste.php"><button id="button">Retour</button></a>
    <center>
<?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');

        $id = $_GET['id'];

        $req = mysqli_query($db, "SELECT * FROM entre WHERE id_entre = $id");
        $row = mysqli_fetch_assoc($req);

        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($numero_personnel) && isset($date_entre) && isset($heure_entre) && isset($materiel_apporter))
            {
                //requête de modification
                $req = mysqli_query($db, "UPDATE entre SET numero_personnel='$numero_personnel', date_entre = '$date_entre', heure_entre = '$heure_entre', materiel_apporter = '$materiel_apporter' WHERE id_entre = $id");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location:http://localhost/amelioration/Admin/entre/liste.php");
                }else
                {
                    $message = "Entrée non modifier";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <h3>Modifier entre numéro:<?=$row['id_entre']?></h3>
        <p>
            <?php
                    //rah misy ilay variable message
                    if(isset($message))
                    {
                        echo $message;
                    }
                ?>
        </p>

        <form action="" method="post">
            <label>Numéro presonnel</label>
            <input type="number" name="numero_personnel" value="<?=$row['numero_personnel']?>">
            <label>Date d'entrée</label>
            <input type="date" name="date_entre" value="<?=$row['date_entre']?>">
            <label>Heure d'entrée</label>
            <input type="time" name="heure_entre" value="<?=$row['heure_entre']?>">
            <label>Materiel apporter</label>
            <input type="text" name="materiel_apporter" value="<?=$row['materiel_apporter']?>">

            <input type="submit" value="Modifier" name="btn" id="button">
            <input type="reset" value="Annuler" id="button">
        </form>
    </div></center>
</body>
</html>