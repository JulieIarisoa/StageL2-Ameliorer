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
    <center>
<?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
            $date= date('d/m/20y');
            date_default_timezone_set('Indian/Antananarivo');
            $heure=date('H:i:s');
        $id = $_GET['id'];
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($materiel_apporter))
            {
                $req = mysqli_query($db, "INSERT INTO entre VALUES (Null, '$id', CURRENT_DATE(),'$heure', '$materiel_apporter',CURRENT_DATE(),'$heure')");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: liste.php");
                }else
                {
                    $message = "Entrée non ajouté";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <h3>Ajouter un personnel</h3>
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
            <label>Materiel apporter</label>
            <input type="texte" name="materiel_apporter"><br>

            <input type="submit" value="Ajouter" name="btn" id="button">
            <input type="reset" value="Annuler" id="button">
        </form>
    </div></center>
</body>
</html>