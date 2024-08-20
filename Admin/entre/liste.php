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
                <center><img src="admin.png" alt="Admin"><p>Administrateur</p></center>
            </li>
            <li>
                <a href="http://localhost/amelioration/Admin/personnel/liste_personnel.php">
                    <button>Personnel</button>
                </a>
            </li>
            <li>
                <a href="#">
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
        </ul>
    </nav>
    

<div class="corp">
    <!--Liste des personnel non arrivee-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre=CURRENT_DATE())");
        if(mysqli_num_rows($requete)==0)
        {
            echo ".......";
        }
        else
        {
            ?><p>.</p>
            <h2>Liste des non arrivées au jourd'hui:</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Numéro téléphone</td>
                </tr>
            <?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['numero_telephone']?></td>
                    <td><a href="ajouter.php?id=<?=$row['numero_personnel']?>"><button id="button3">Arriver</button></a>
                    </td></tr><?php
            }
        }
    ?>
    </table>
    <!--Liste des personnel arrivee-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM entre WHERE date_entre=CURRENT_DATE()");
        if(mysqli_num_rows($requete)==0)
        {
            echo "........";
        }
        else
        {
            ?><h2>Liste des arrivées :</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Date entré</td>
                    <td>Heure entré</td>
                    <td>Materiel apporter</td>
                    <td>Date création</td>
                    <td>Heure création</td>
                </tr>
            <?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['date_entre']?></td>
                    <td><?=$row['heure_entre']?></td>
                    <td><?=$row['materiel_apporter']?></td>
                    <td><?=$row['date_creation']?></td>
                    <td><?=$row['heure_creaction']?></td>
                    <td><a href="modifier.php?id=<?=$row['id_entre']?>"><button id="button1">Modifier</button></a>
                    </td></tr>
                <?php
            }
        }
    ?>
    </table>
    <!--Liste de tous les entres-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM entre");
        if(mysqli_num_rows($requete)==0)
        {
            echo ".......";
        }
        else
        {
            ?><h2>Liste de tout entres :</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Date entré</td>
                    <td>Heure entré</td>
                    <td>Materiel apporter</td>
                    <td>Date création</td>
                    <td>Heure création</td>
                </tr>
            <?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['date_entre']?></td>
                    <td><?=$row['heure_entre']?></td>
                    <td><?=$row['materiel_apporter']?></td>
                    <td><?=$row['date_creation']?></td>
                    <td><?=$row['heure_creaction']?></td>
                    <td><a href="modifier.php?id=<?=$row['id_entre']?>"><button id="button1">Modifier</button></a></td>
                    <td><a href="supprimer.php?id=<?=$row['id_entre']?>"><button id="button2">Supprimer</button></a></td></tr>
                <?php
            }
        }
    ?>
    </table></div>
</body>
</html>