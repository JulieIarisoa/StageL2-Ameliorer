<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
            <link rel="stylesheet" href="./css/login.css">
        </head>
        <body>
            <div class="conn">
                <center>
                    <?php  
                        session_start();
                        //database connexion
                        include_once "data.php";

                        //*****************Login**************************//
                        // check if add button is very click
                        if(isset($_POST['log'])){

                            //send information by post methode
                            extract($_POST);

                            // check that all field are totally complete
                            if(isset($_POST['username']) && isset($_POST['password']))
                            {
                                //condition if the field are not void
                                if($username !== "" && $password !== "")
                                {
                                    //searched the values enter by user 
                                        $requete = "SELECT count(*) FROM utilisateur where nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
                                        $exec_requete = mysqli_query($db,$requete);
                                        $reponse = mysqli_fetch_array($exec_requete);
                                        $count = $reponse['count(*)'];

                                        if($count!=0) //if the values enter by user exist go at principale.php page
                                        {
                                            if($username=='admin'){
                                                header('Location:http://localhost/amelioration/Admin/personnel/liste_personnel.php');
                                            }
                                            else
                                            {
                                                header('Location:http://localhost/amelioration/user/personnel/personnel_liste.php'); 
                                            }
                                        }
                                        else
                                        {
                                            header('Location: login.php?erreur=1'); //if one of the values enter by user not exist return at login.php page and notify error
                                        }
                                }
                                else
                                {
                                header('Location: login.php?erreur=2'); //if the values enter by user not exist return at login.php page and notify error
                                }
                            }
                            else
                            {
                            header('Location: login.php');
                            }
                            mysqli_close($db);

                        }
                    ?>
                        
                    <form action=" " method="POST">
                        <h2>Connexion</h2>
                        <?php
                            if(isset($_GET['erreur']))
                            {
                                $err = $_GET['erreur'];
                                if($err==1 || $err==2|| $err==3)
                                echo "<center><p style='color:red'>Nom d'utilisateur ou mot de passe invalide</p></center>";
                            }
                            ?>
                        <label><b>Nom d'utilisateur :</b></label>
                        <input type="text" placeholder="Username" name="username" required>
                        <label><b>Mot de passe :</b></label>
                        <input type="password" placeholder="Password" name="password" required>
                        <input type="submit" value='LOGIN' name="log" class="login">
                    </form>
                </center>
            </div>
        </body>
    </html>