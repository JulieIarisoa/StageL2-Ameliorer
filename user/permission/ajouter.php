<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
 <center>   
<div class="formulaire">
    <h3>Ajouter un permission</h3>
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
        <?php
    $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
            $req=mysqli_query($db,"SELECT numero_personnel FROM personnel");
            if(mysqli_num_rows($req)==0)
            {
                //rah tsis employe ao @ base de données
                echo "il n'y a pas de photo ajouter!";
            }else
            {
                ?>
                <select name="numero_personnel" id="select">
                    <?php
                while($row = mysqli_fetch_assoc($req))
            {
                    
        ?>
                <option value="<?=$row['numero_personnel']?>" name="numero_personnel"><?=$row['numero_personnel']?></option>
    <?php
                }
            }
        ?>
        </select>
        <label>Motif</label>
        <input type="text" name="motif" id="motif"><br>

        <input type="submit" value="Ajouter" name="btn" id="button">
    </form>

</div>
<?php
    $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        date_default_timezone_set('Indian/Antananarivo');
        $heure=date('H:i:s');
    // verifier que le bouton ajouter est bien cliquer
    if(isset($_POST['btn']))
    {
        //envoye des information par post
        extract($_POST);
        
        // verifier que tout les champs ont été remplis
        if(isset($numero_personnel) && isset($motif))
        {
            //connectio à la base de données

            //requête d'ajout
            $req = mysqli_query($db, "INSERT INTO permission VALUES (Null, '$numero_personnel', CURRENT_DATE(),'$heure', '00:00:00', '$motif',CURRENT_DATE(),'$heure')");
            if($req)
            {
                //requete d'ajout avec succés 
                header("Location:http://localhost/amelioration/User/permission/liste.php");
            }else
            {
                $message = "Permission non ajouté";
            }
        }else
        {
            //rah tsy misy inona ny champ
            $message= "Veuillez remplir tous les champs !";
        }
    }
?></center>
</body>
</html>