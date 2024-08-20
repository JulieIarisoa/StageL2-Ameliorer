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
    <!--Liste des personnel non sortir-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre=CURRENT_DATE()) AND numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN sortie ON(personnel.numero_personnel = sortie.numero_personnel) WHERE sortie.date_sortie=CURRENT_DATE())");
        if(mysqli_num_rows($requete)==0)
        {
            echo "il n'y a aucun personnel sortir aujourd'hui!";
        }
        else
        {
            ?>
            <p>.</p><h2>Liste des non sortir au jourd'hui:</h2>
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
                    <td><a href="ajouter.php?id=<?=$row['numero_personnel']?>"><button id="button3">Sortir</button></a>
                    </td></tr><?php
            }
        }
    ?></table>
    <!--Liste des personnel sortir-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM sortie WHERE date_sortie=CURRENT_DATE()");
        if(mysqli_num_rows($requete)==0)
        {
            echo "il n'y a aucun personnel non sortir aujourd'hui!";
        }
        else
        {
            ?><h2>Liste des personnel sortir :</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Date sortie</td>
                    <td>Heure sortie</td>
                </tr><?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['date_sortie']?></td>
                    <td><?=$row['heure_sortie']?></td>
                    <td><a href="modifier.php?id=<?=$row['id_sortie']?>"><button id="button1">Modifier</button></a></td>
                    <td><a href="supprimer.php?id=<?=$row['id_sortie']?>"><button id="button2">Supprimer</button></a></td>
                    </tr><?php
            }
        }
    ?>
    </table></center>
</body>
</html>