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
        <a href="liste_personnel.php"><button id="button">Retour</button></a>
    <center>
<?php
        //connectio à la base de données
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');

        //recuperation de d'id
        $id = $_GET['id'];

        //requête d'affiche des info de l'employé
        $req = mysqli_query($db, "SELECT * FROM personnel WHERE numero_personnel = $id");
        $row = mysqli_fetch_assoc($req);

        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($nom) && isset($prenom) && isset($poste) && $numero_telephone && isset($email))
            {
                //requête de modification
                $req = mysqli_query($db, "UPDATE personnel SET nom='$nom', prenom = '$prenom', poste = '$poste', numero_telephone = '$numero_telephone', email = '$email', age='$age', numero_cin='$numero_cin', adresse='$adresse',langue='$langue'  WHERE numero_personnel = $id");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: liste_personnel.php");
                }else
                {
                    $message = "Personnel non modifier";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <h3>Modifier le personnel: <?=$row['nom']?></h3>
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
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>" required><br>
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>"><br>
            <label>Poste</label>
            <input type="text" name="poste" value="<?=$row['poste']?>" required><br>
            <label>Numéro téléphone</label>
            <input type="text" name="numero_telephone" value="<?=$row['numero_telephone']?>" required><br>
            <label>Email</label>
            <input type="email" name="email" value="<?=$row['email']?>" required><br>
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>" required><br>
            <label>Numero CIN</label>
            <input type="number" name="numero_cin" value="<?=$row['numero_cin']?>" required><br>
            <label>Adresse</label>
            <input type="adresse" name="adresse" value="<?=$row['adresse']?>" required><br>
            <label>Langue</label>
            <input type="text" name="langue" value="<?=$row['langue']?>" required><br>

            <input type="submit" value="Modifier" name="btn" id="button">
            <input type="reset" value="Annuler" id="button">
        </form>
    </div></center>
</body>
</html>