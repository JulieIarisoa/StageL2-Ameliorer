<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        p{
            font-weight:bold;
            color:white;
            font-size:20px;
            margin-bottom:15px
        }
    </style>
</head>
<body>
    
<nav>
        <ul>
            <li>
                <center><img src="admin.png" alt="Utilisateur"><p>Utilisateur</p></center>
            </li>
            <li>
                <a href="http://localhost/amelioration/User/personnel/personnel_liste.php">
                    <button>Personnel</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/User/entre/liste.php">
                    <button>Entre</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/User/permission/liste.php">
                    <button>Permission</button>
                </a>
            </li>
            <li>
                <a href="http://localhost/amelioration/User/sortie/liste.php">
                    <button>Sortie</button>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="corp">
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM personnel");
        if(mysqli_num_rows($requete)==0)
        {
            echo "il n'y a aucun personnel";
        }
        else
        {
            ?>
            <p>.</p><h2>Liste de tout les personnels:</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Age</td>
                    <td>Nuémro CIN</td>
                    <td>Numéro téléphone</td>
                    <td>Email</td>
                    <td>Adresse</td>
                    <td>Langue</td>
                    <td>Date de debut travail</td>
                </tr><?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['age']?></td>
                    <td><?=$row['numero_cin']?></td>
                    <td><?=$row['numero_telephone']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['adresse']?></td>
                    <td><?=$row['langue']?></td>
                    <td><?=$row['date_creation']?></td>
                    </tr><?php
            }
        }
    ?></table></div>
</body>
</html>