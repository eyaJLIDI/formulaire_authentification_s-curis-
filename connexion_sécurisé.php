<?php
if(!empty($_POST)){
    if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) 
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("ce n'est pas un email");
        }
        require_once "connect.php";
        $sql = "SELECT * FROM 'users' WHERE 'email' = :email";
        $query= $db->prepare($sql);
        $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
        $query->execute();
        
        $user = $query->fetch();
        
        if(!$user){
            die("l'utilisateur ou/et le mot de passe est incorrecte");
        }
        if(!password_verify($_POST['password'], $user['password'])){
            die("l'utilisateur ou/et le mot de passe est incorrecte");
        }
        
    }
        
    }
   
?>

<!Doctype html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h1>connexion</h1>
  <form method="post">
      <input type="email" name="email" placeholder="email...">
    <input type="password" name="password" placeholder="password...">
    <input type="submit" name="connecter" value="connexion">
  </form>
</body>
</html>