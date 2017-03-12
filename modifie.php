<?php
session_start();
include 'api.php';
afficher_menu();
?>
	<div id="register_box">
	<form id="ajout" method="post" enctype="multipart/form-data">
		ID<br>
		<input type="text" name="id"><br><br>
		lien youtube<br>
		<input type="text" name="lien"><br><br>
	<input type="submit" value="Modifier">
	</form>
	</div>
<?php
$titre=$_POST["id"];
$lien=$_POST["lien"];

$conn = connexion_bdd();

$sql="UPDATE film set lien='$lien' where idf='$titre'";
  if($conn->query($sql)==TRUE){
  echo"OK";
}
?>
</body>
</html>
