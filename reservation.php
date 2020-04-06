<!doctype html>
<html lang="fr">
<head>
<title>detail de reservation</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<header>
<?php include('header.php'); ?>
</header>


<?php


$bdd=mysqli_connect("localhost", "root","","reservationsalles");

if(isset($_POST['effacer']))
{
    $message= $_SESSION['id'];
    $query3="DELETE FROM `reservations` WHERE id = '$message'";
    mysqli_query($bdd, $query3);
    header ('location: planning.php');          
}



$id=$_SESSION['id'];
$requete= "SELECT * FROM  reservations WHERE id ='$id'";
$query=mysqli_query($bdd,$requete);
$result=mysqli_fetch_array($query);

$login=$result['id_utilisateur'];
$requete2="SELECT login from utilisateurs where id='$login'";
$query2=mysqli_query($bdd,$requete2);
$result2=mysqli_fetch_array($query2);
?>


<section class="resa">
<form method="post">
    <label>Login :</label>
            <input disabled="disabled" type="text" name="login" value="<?php echo $result2['login'];?>">
        <label>Titre :</label>  
            <input disabled="disabled" required type="text" name="titre" value="<?php  echo $result['titre']; ?>">
        <label>Description :</label>
            <textarea disabled="disabled" name="description"><?php  echo $result['description']; ?></textarea>
        <label>Début :</label>
            <input disabled="disabled" required name="datedebut" type="datetime-local" id="meeting-time" value="<?php echo SUBSTR($result['debut'], 0, 10)?>T<?php echo SUBSTR($result['debut'], 11, 8); ?>">   
        <label>Fin :</label>
            <input disabled="disabled" required name="datefin" type="datetime-local" id="meeting-time" value="<?php echo SUBSTR($result['fin'], 0, 10)?>T<?php echo SUBSTR($result['fin'], 11, 8); ?>"> 
        <?php if($_SESSION['login']=="admin" || $_SESSION['login']==$result2['login'])
        {
            ?>
            <input type="submit" name="effacer" value="Supprimer">
            <?php
        }
        ?>
</form> </section>

    </body>


    </html>