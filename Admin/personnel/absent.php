<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
    #button9{
        background-color: rgb(241, 64, 94);
        border:none;
        color:white;
        font-weight:bold;
        margin-top: 5px;
        width:120px;
        height:25px;
    }
    #button9:hover{
        border: 2px solid rgb(241, 64, 94);
        color:rgb(241, 64, 94);
        background-color:white;
    }
</style>
</head>
<body>
    <a href="liste_personnel.php">
        <button id="button9">Retour</button>
    </a> 
        <?php
            $date = $_POST['absence'];
            $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
            $req=mysqli_query($db,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre='$date')");
            if(mysqli_num_rows($req)==0)
            {
                //rah tsis employe ao @ base de données
                echo "il n'y a aucun personnel absent!";
            }else
            {?>
                <h2>Liste des absents en <?=$date?>:</h2>
                <table>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Poste</td>
                        <td>Numéro téléphone</td>
                        <td>Email</td>
                    </tr>
                <?php
                        while($row = mysqli_fetch_assoc($req))
                        {?><tr>
                            <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['poste']?></td>
                                <td><?=$row['numero_telephone']?></td>
                                <td><?=$row['email']?></td>
                                </tr><?php
                        }
                    }
                ?></table>
</body>
</html>