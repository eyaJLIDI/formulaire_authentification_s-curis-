<?php
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=localhost;dbname=BDD_res";

    try{
        $dbh = new PDO($dsn,$user,$pass);
    }catch(PDOException $e){
        echo "erreur".$e->getMessage();
        
    }

?>