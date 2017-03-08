<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Register</title>
</head>
<body>
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
	<input type="submit" value="S'inscrire">
	</form>
	</div>
<?php
$titre=$_POST["titre"];
$lien=$_POST["lien"];
$rea=$_POST["realisateur"];
$aff=$_POST["affiche"];
$date=$_POST["date"];

$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="insert into film (titre, lien, realisateur, affiche, date) values ('$titre', '$lien', '$rea', '$aff', '$date')";
  if($conn->query($sql)==TRUE){
  echo"OK";
}
?>
</body>
</html>
