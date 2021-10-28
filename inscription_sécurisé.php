<?php
if(!empty($_POST))
    if(isset($_POST['username'], $_POST['email'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $pseudo = strip_tags($_POST['username']);
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            die("l'dresse email est incorrecte");
        }
        
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        die($password);
        
        //on enregistre dans la base de données
        require_once "connect.php";
        $sql = "INSERT INTO 'users'('username', 'email', 'password') VALUES (:pseudo, :email, '$password')";
        
        $query = $db->prepare($sql);
        $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $query->execute();
        
    }
    else 
    {
      die("le formulaire est incomplet");  
    }
?>

<!Doctype html>
<html>
<head>
    <title>Page d'inscription</title>
</head>
<body>
    <h1>Inscription</h1>
  <form method="post">
    <input type="text" name="username" placeholder="username...">
      <input type="email" name="email" placeholder="email...">
    <input type="password" name="password" placeholder="password...">
    <input type="submit" name="inscription">
    <input type="reset" name="reset">
  </form>
</body>
</html>