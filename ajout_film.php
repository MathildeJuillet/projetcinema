<?php
session_start();
include 'api.php';
afficher_menu();
?>
	<div id="register_box">
	<form id="ajout" method="post" enctype="multipart/form-data">
		Titre<br>
		<input type="text" name="titre"><br><br>
		lien youtube<br>
		<input type="text" name="lien"><br><br>
		realisateur<br>
		<input type="text" name="realisateur"><br><br>
		lien affiche<br>
		<input type="text" name="affiche"><br><br>
		date<br>
		<input type="date" name="date"><br><br>
	<input type="submit" value="Ajouter">
	</form>
	</div>
<?php
if(isset($_POST["titre"]) && isset($_POST["lien"]) && isset($_POST["realisateur"]) && isset($_POST["affiche"]) && isset($_POST["date"])){
	$titre=$_POST["titre"];
	$lien=$_POST["lien"];
	$rea=$_POST["realisateur"];
	$aff=$_POST["affiche"];
	$date=$_POST["date"];

	$conn = connexion_bdd();

	$sql="insert into film (titre, lien, realisateur, affiche, date) values ('$titre', '$lien', '$rea', '$aff', '$date')";
	if($conn->query($sql)==TRUE){
	  echo"OK";
	}

	$sql="SELECT idf from film where titre='$titre' && realisateur='$rea'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$id=$row['idf'];
		}
	}

	$sql="INSERT INTO notation (excellent, idf) values ('0', '$id')";
	if($conn->query($sql)==TRUE){
	}
}
?>
</body>
</html>
