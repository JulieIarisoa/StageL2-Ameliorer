<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
</head>
<body>
    
<nav>
        <ul>
            <li>
                <center><img src="admin.png" alt="Admin"><p color="White">Administrateur</p></center>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/personnel/liste_personnel.php">
                    <button>Personnel</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/entre/liste.php">
                    <button>Entre</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/permission/liste.php">
                    <button>Permission</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/sortie/liste.php">
                    <button>Sortie</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/personnel/ajouter.php">
                    <button>Ajouter un personnel</button>
                </a>
            </li>
        </ul>
    </nav>
    <div class="rech">
    <form action="absent.php" method="post">
        <input type="date" name="absence" required>
        <input type="submit" value="Recherche" id="button3">
    </form>
</div>
<p>.</p>
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM personnel");
        if(mysqli_num_rows($requete)==0)
        {
            echo "il n'y a aucun personnel";
        }
        else
        {
            ?><center><h2>Liste de tout les personnel:</h2></center><?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?>
                <div class="corp">
                    <div class="image">
                    <?php
                        $nom_image=$row['image'];
                        if(!is_dir('image'))
                        mkdir('image',0777);
                        $fichier= opendir('image/');
                        while($fichier_courant = readdir($fichier))
                        {
                            $extention = strtolower(strrchr($fichier_courant,'.'));
                            if($extention == '.jpg' || $extention == '.jpeg' || $extention == '.png')
                            {
                                $nom_image_image = 'image/'.$fichier_courant;
                                
                                if(!file_exists($nom_image_image))
                                {
                                    $im = imagecreatefromjpeg($fichier_courant);
                                    $largeur_image = 10;
                                    $hauteur_image = $hauteur / $largeur*150;
                                    $im_image = imagecreatetruecolor($largeur_image,$hauteur_image);
                                    imagecopyresampled($im_image, $im, 0, 0, 0, 0);
                                    imagejpeg($im_image, $nom_image_image, 60);
                                }
                                else
                                {
                                    if($fichier_courant == $nom_image)
                                    {
                                        echo '<img src="'.$nom_image_image.'" title = cliquez pour agrandir" class="photo">'; 
                                    }
                                }
                            }
                        }
                    ?>
                </div>
                <div class="info">
                    <p><b>Date de debut travail: </b><?=$row['date_creation']?></p>
                    <p><b>Numéro personnel: </b><?=$row['numero_personnel']?></p>
                    <p><b>Nom: </b><?=$row['nom']?><p>
                    <p><b>Prénom: </b><?=$row['prenom']?><p>
                    <p><b>Age: </b><?=$row['age']?><p>
                    <p><b>Numéro CIN: </b><?=$row['numero_cin']?><p>
                    <p><b>Numéro téléphone: </b><?=$row['numero_telephone']?><p>
                    <p><b>Email: </b><?=$row['email']?></p>
                    <p><b>Adresse: </b><?=$row['adresse']?><p>
                    <p><b>Langue: </b><?=$row['langue']?><p><br></div>
                    <a href="modifier.php?id=<?=$row['numero_personnel']?>"><button id="button1">Modifier</button></a>
                    <a href="supprimer.php?id=<?=$row['numero_personnel']?>"><button id="button2">Supprimer</button></a></div>
                <?php
            }
        }
    ?>
</body>
</html>