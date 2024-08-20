<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
    <body><center>
        <h3>Ajouter nouveau personnel</h3>
		<form method="post" enctype="multipart/form-data">
            <div class="div1">
                <label>Nom</label>
                <input type="text" name="nom" required>
                <label>Prénom</label>
                <input type="text" name="prenom">
                <label>Poste</label>
                <input type="texte" name="poste" required>
                <label>Numéro téléphone</label>
                <input type="texte" name="numero_telephone" required>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="div2">
                <label>Age</label>
                <input type="number" name="age" required>
                <label>Numero CIN</label>
                <input type="number" name="numero_cin" required>
                <label>Adresse</label>
                <input type="adresse" name="adresse" required>
                <label>Langue</label>
                <input type="text" name="langue" required>
                <label>Photo</label>
                <input type="file" name="image" required>    
            </div>
                <input type="submit" value="Ajouter" name="btn" id="button">
                <input type="reset" value="Annuler" id="button">
		</form></center>

        <?php
            // verifier que le bouton ajouter est bien cliquer
            $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
            if(isset($_POST['btn'])&& isset($_FILES['image']['tmp_name']))
            {
                $taille = getimagesize($_FILES['image']['tmp_name']);
                $largeur = $taille[0];
                $hauteur = $taille[1];
                $largeur_miniature = 300;
                $hauteur_miniature = $hauteur / $largeur * $largeur_miniature;
                $im = imagecreatefromjpeg($_FILES['image']['tmp_name']);
                $im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
                imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
                imagejpeg($im_miniature, 'image/'.$_FILES['image']['name'], 90);
                /*imagejpeg($im_miniature, $_FILES['image']['name'], 90);*/
                //requête d'ajout
                $image = $_FILES['image']['name'];

                //envoye des information par post
                extract($_POST);
                
                // verifier que tout les champs ont été remplis
                if(isset($nom) && isset($prenom) && isset($poste) && $numero_telephone && isset($email))
                {
                    //connectio à la base de données

                    //requête d'ajout
                    $req = mysqli_query($db, "INSERT INTO personnel VALUES (Null, '$nom', '$prenom','$poste', '$numero_telephone','$email','$age','$numero_cin','$adresse','$langue',Now(),'$image')");
                    if($req)
                    {
                        //requete d'ajout avec succés 
                        echo "ok";
                        header("Location: liste_personnel.php");
                    }else
                    {
                        $message = "Employé non ajouté";
                    }
                }else
                {
                    //rah tsy misy inona ny champ
                    $message= "Veuillez remplir tous les champs !";
                }
            }
    ?>

    </body>
</html>