<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="style.css">
</head>
<header>
<?php include "header.php"; ?>
</header>
<body>
<header>
<h1> Foot en Salle</h1>
</header>
<section>
<h2>Connectez-vous pour réserver un terrain</h2>
 <article id="connexion1">
        <form method="POST" action="connexion.php">
            <input type="text" name="login" placeholder="Nom d'utilisateur" required><br/>
            <input type="password" name="password" placeholder="Mot de passe" required><br/>
            <button type="submit" name="submit" value="Se connecter">Connectez-vous !</button>
        </form>
  </article>
</section>
</body>
</html>
<?php
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
if(isset($_POST["submit"]))
{       
        $login = htmlspecialchars($_POST["login"]);
        $mdp = htmlspecialchars($_POST['password']);

        if(!empty($login) && !empty($mdp))
        {       
                $query = "SELECT login FROM utilisateurs WHERE login='$login'";
                $execquery = mysqli_query($connexion, $query);
                $rows = mysqli_num_rows($execquery);


                if($rows==0)
                {       $erreur = "Login ou mot de passe incorrect.";
                        
                }
                else
                {
                        
                        $checkpass = "SELECT password FROM utilisateurs WHERE login = '$login'";
                        $checkpassquery = mysqli_query($connexion,$checkpass);
                        $cryptedpass = mysqli_fetch_all($checkpassquery);
                        $cryptedpass = $cryptedpass[0][0];
                        $passencrypt = password_verify($mdp, $cryptedpass);
                         var_dump( $result);
                        if($passencrypt == true)
                        {
                        $userinfo = mysqli_fetch_all($execquery);
                        $infos = ("SELECT id,login FROM utilisateurs WHERE login ='$login'");
                        $query = mysqli_query($connexion, $infos);
                        $result = mysqli_fetch_all($query);
                        $_SESSION['id']=$result[0][0];
                        $_SESSION['login']=$login;
                        $_SESSION['password']=$_POST['password'];

                         header('Location: index.php');
                        }
                        else
                        {
                                
                                $erreur = "Login ou mot de passe incorrect.";
                        }
                       
                }
                
        
                if($_POST['login'] == 'admin' && $_POST['password'] == 'admin')
        {
               
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['id'] = $result[0][0];
                $_SESSION['prenom'] = $result[0][2];
                $_SESSION['nom'] = $result[0][3];
                header('Location: index.php');
        

        }
       
}
else
{
        $erreur = "Tous les champs doivent être complétés.";
}


}


?>



                
        <?php if(isset($erreur)) 
    {
        echo "<b>"."<p style='color:red; font-size:20px; padding-bottom:20%; text-align:center; padding-top : 13%'>".$erreur."</p>"."</b>";
    }
?>