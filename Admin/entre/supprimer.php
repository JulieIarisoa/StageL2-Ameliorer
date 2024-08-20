<?php
    $db = mysqli_connect('localhost', 'root', '','amelioration_stage') or die('could not connect to database');
    
    $id = $_GET['id'];

    $req= mysqli_query($db,"DELETE  FROM entre WHERE id_entre = $id");
    
    header("Location:http://localhost/amelioration/Admin/entre/liste.php");
?>