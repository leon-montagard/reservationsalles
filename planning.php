<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Planning</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<?php include('header.php') ?>
</header>



<?php
if(isset($_POST['envoyer']))
{
	$_SESSION['id']=$_POST['test'];
	header("Location: reservation.php");
}

	$con=mysqli_connect("localhost","root","","reservationsalles");
	mysqli_set_charset($con, "utf8");
	$date="SELECT * FROM reservations";
	$query=mysqli_query($con, $date);
	$result=mysqli_fetch_all($query);


?>

<section>

<article>
<table>
	<thead>
		<tr>
			<th>
			</th>
			<th class="ligne-jours">
				Lundi
			</th>
			<th  class="ligne-jours">
				Mardi
			</th>
			<th  class="ligne-jours">
				Mercredi
			</th>
			<th class="ligne-jours">
				Jeudi
			</th>
			<th class="ligne-jours">
				Vendredi
			</th>
			<th class="ligne-jours">
				Samedi
			</th>
			<th class="ligne-jours">
				Dimanche
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
		for($ligne =8; $ligne <= 19; $ligne++ )
		{
			echo "<tr>";
			echo "<td>".$ligne."</td>";

			for($colonne = 1; $colonne <= 7; $colonne++)
			{
				echo "<td>";
				foreach($result as $value)
				{
				$jour=date("w", strtotime($value[3]));
				$h=date("H", strtotime($value[3]));
				if($h==$ligne && $jour== $colonne)
				{
					echo $value[1];
				?>
					<form method="post">	
						<input name="envoyer" type="submit" value="Détail">

						<input name="test" type="hidden" value="<?php echo $value[0]; ?>">
					</form>	
				<?php					
				}
			}
				echo "</td>";
			}
		}
		echo "</tr>";

?>
		
</table>


</article>

</section>

</body>

</html> 
