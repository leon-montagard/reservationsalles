<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="style.css">
</head>
<header>
  <?php
include('header.php')
?>
</header>
<body>

<header>
<h1> Foot en Salle</h1>
</header>
    <h2>Inscrivez-vous pour pouvoir réserver un terrain</h2>
     <div id="form-inscription">
        <form method="POST" action="inscription.php">
         <input type="text" name="login" placeholder="Choisissez un nom d'utilisateur" required><br/>
         <input type="password" name="password" placeholder="Entrez un mot de passe" required><br/>
         <input type="password" name="passwordconfirm" placeholder="Confirmez votre mot de passe" required> <br/>
              <button  type="submit" name="submit">Inscrivez-vous !</button>
     </div>
</form>
</body>
</html>
<?php 
//session_start();
$connexion = mysqli_connect('localhost','root','','reservationsalles');


if(isset($_POST['submit']))
{
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $cmdp = password_hash($_POST['passwordconfirm'], PASSWORD_DEFAULT);
        $login = htmlspecialchars($_POST['login']);

        $loginlenght = strlen($_POST['login']);
        

    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['passwordconfirm']))
    {   
        $login = $_POST['login'];
        $check = "SELECT login FROM utilisateurs WHERE login = '$login'";
        $query_exist= mysqli_query($connexion,$check);
        $result_exist= mysqli_num_rows($query_exist);
        
        
        if (mysqli_num_rows($query_exist) == 0)
    {  
        
        if($loginlenght <= 255)
        {
        
            if($_POST['password'] == $_POST['passwordconfirm'])
            {
                $insertmbr =("INSERT INTO utilisateurs(login,password) VALUES ('$login','$mdp')");
                $query= mysqli_query($connexion, $insertmbr);
                $eror = "Votre compte à bien été crée ! ";
                header('Location: index.php');
            }
            else
            {
                $eror = "Vos mots de passes ne correspondent pas !";
            }
            

        }
        else
        {
            $eror = "Votre pseudo n'est pas valide !";
        }
        if($nomlenght <= 255)
        {   
        }
        else
        {
            $eror = "Vous ne pouvez pas utiliser ce".$_POST['nom']." !";
        }
        if($prenomlenght <= 255)
        {
        }
        else
        {
            $eror = "Vous ne pouvez pas utiliser ce".$_POST['prenom']." !";
        }
    }
     else
     {
        $erreur = "Ce login n'est pas disponnible";
        echo "<b>".$erreur."</b>";
     }
    
    }
    else
        {
            $eror = "Tous les champs doivent être complétés.";
        }
}
if(isset($eror))
        {
            echo $eror;
        } 
        
?>