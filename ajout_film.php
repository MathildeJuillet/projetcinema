<?php
session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styleT.css" />
    <title>Orange Mech'anique</title>
</head>
<body>
  <div class="header">
      <a href='accueil.php'><div class="button" id="accueil">Accueil</div></a>
      <?php
      if (isset($_SESSION['login'])) {
        echo "<a href='deconnexion.php'><div class='button' id='connexion'>Deconnexion</div></a>";
      }
      else {
        echo "<a href='connexion.php'><div class='button' id='connexion'>Connexion</div></a>";
      }
      ?>
      <a href='recommandes.php'><div class="button" id="recommandes">Recommandés</div></a>
      <a href='noueautes.php'><div class="button" id="new">Nouveautés</div></a>
      <?php
      if (isset($_SESSION['login'])) {
        echo "<a href='ma_page.php'><div class='button' id='ma_page'>Ma page</div></a>";
      }
      else {
        echo "<a href='register.php'><div class='button' id='ma_page'>S'inscrire</div></a>";
      }
      ?>
    <div id="devise">Orange Mech'Anique</div>
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
