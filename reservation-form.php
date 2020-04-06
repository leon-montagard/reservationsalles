<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Form-resa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
<?php include('header.php');
?>
</header>
<main>




<form action="reservation-form.php" method="post">
<fieldset>
   <legend>Evenement </legend>
   <label>Titre :</label>
		<input type="text" name="titre" >
<label>Description :</label>
        <input type="text" name="description"></fieldset>
<fieldset>  
<legend>Date </legend>      
<label>Date de début :</label>
		<input type="datetime-local" name="debut">
<label>Date de fin :</label>
        <input type="datetime-local" name="fin">
</fieldset>
        <input type="submit" name="reservez" value="Reservez">

</form>

<?php
if(isset($_POST["reservez"]))
{	
	$titre=$_POST["titre"];
	$des=$_POST["description"];
	$debut= $_POST["debut"];
	$fin=$_POST["fin"];		
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
    $id=$_SESSION["id"];

	$requete = "INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`)
VALUES ('".$titre."', '".$des."', '".$debut."', '".$fin."' , '".$_SESSION["id"]."')";  
  $query = mysqli_query($connexion, $requete);
var_dump($requete);
	header('Location: planning.php');
	
}
else{
	echo'creneau indisponible';
}
var_dump($_SESSION['id']);
?>
	





        </main>	
</body>
</html>