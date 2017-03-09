<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Modifier</title>
</head>
<body>
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

$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="UPDATE film set lien='$lien' where idf='$titre'";
  if($conn->query($sql)==TRUE){
  echo"OK";
}
?>
</body>
</html>
