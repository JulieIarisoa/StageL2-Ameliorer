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
        .button4{
            background-color:rgb(241, 64, 94);
            width:120px;
            height:30px;
            margin-top:5px;
            border:none;
            color:white;
            font-weight:bold;
        }
        .button4:hover{
            border: 2px solid rgb(241, 64, 94);
            color:rgb(241, 64, 94);
            background-color:white;
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
<div>
            <a href="ajouter.php"><button class="button4">Ajouter</button></a>

    <!--Liste des personnel en permission-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT * FROM permission WHERE heure_retour='00:00:00'");
        if(mysqli_num_rows($requete)==0)
        {
            echo "<p>***Il n'y a aucun personnel en permission en ce moment!</p>";
        }
        else
        {
            ?>
        <h2>Liste des personnel en ce moment:</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Date permission</td>
                    <td>Heure de sortie</td>
                </tr><?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['date_permission']?></td>
                    <td><?=$row['heure_sortie']?></td>
                    <td><a href="retour.php?id=<?=$row['id_permission']?>"><button id="button3">Retourner</button></a>
                    </td></tr><?php
            }
        }
    ?></table>
    <!--Liste des personnel sortir-->
    <?php
        $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
        $requete=mysqli_query($db,"SELECT id_permission,numero_personnel,date_permission, heure_sortie, heure_retour, motif ,TIMEDIFF(heure_retour, heure_sortie) AS dure_permission FROM permission WHERE heure_retour!='00:00:00' AND date_permission=CURRENT_DATE()");
        if(mysqli_num_rows($requete)==0)
        {
            echo "<p>***Il n'y a aucun personnel retourner!</p>";
        }
        else
        {
            ?><h2>Liste des permissions au jourd'hui :</h2>
            <table>
                <tr>
                    <td>Numéro personnel</td>
                    <td>Date permission</td>
                    <td>Heure permission</td>
                    <td>Heure retour</td>
                    <td>Duré permission</td>
                    <td>Motif</td>
                </tr><?php
            while($row = mysqli_fetch_assoc($requete))
            {
                ?><tr>
                    <td><?=$row['numero_personnel']?></td>
                    <td><?=$row['date_permission']?></td>
                    <td><?=$row['heure_sortie']?></td>
                    <td><?=$row['heure_retour']?></td>
                    <td><?=$row['dure_permission']?></td>
                    <td><?=$row['motif']?></td>
                    <td><a href="modifier.php?id=<?=$row['id_permission']?>"><button id="button1">Modifier</button></a></td>
                    <td><a href="http://localhost/amelioration/User/permission/Supprimer.php?id=<?=$row['id_permission']?>"><button id="button2">Supprimer</button></a></td>
                    </tr><?php
            }
        }
    ?></table></div>
</body>
</html>