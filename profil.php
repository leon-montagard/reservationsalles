<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Profil</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<?php include('header.php');
?>
</header>


<h2>modifiez votre profil</h2>

<div class="form-modifier">
<form class="formulaire" name="profil" method="post" action="profil.php">
<b>Entrez votre login:</b><br/>
<input type="text" name="login" value="<?php echo $_SESSION ['login'];?>"><br/>

<b>Entrez votre mot de passe:</b><br/>
<input type="password" name="password" value="<?php echo $_SESSION['password'];?>"><br/>
    
      
<b>confirmez votre mot de passe :</b><br/>
<input type="password" name="password1"value="<?php
        echo $_SESSION['password'];?>"><br/>
        
        <input type="submit" name="valider" value="Valider"/>
</form></div> 
<?php

if(isset($_POST['valider']))
{
    

 $db=mysqli_connect("localhost","root","","reservationsalles");
 $newlogin= $_POST['login']; 
 $login= $_SESSION['login']; 
 $password= $hash=password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);

 $req= "UPDATE utilisateurs SET login = '".$newlogin."', password = '".$password."' WHERE login= '".$login."' ";
 $query= mysqli_query ($db, $req);
 $_SESSION['login']=$newlogin;
 $_SESSION['password']=$password;
 header('location: index.php');
}
?>