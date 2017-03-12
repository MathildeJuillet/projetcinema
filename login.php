<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Register</title>
</head>
<body>
	<div id="register_box">
	<form id="formulaire" method="post" enctype="multipart/form-data">
		Pseudo<br>
		<input type="text" name="pseudo"><br><br>
		Mot de passe<br>
		<input type="password" name="mdp"><br><br>
	<input type="submit" value="Login">
	</form>
	</div>
<?php
$pseudo=$_POST["pseudo"];
$mdp=$_POST["mdp"];
$is_connected=false;

include 'api.php';
$conn = connexion_bdd();

$sql = "SELECT pseudo, mdp FROM utilisateur";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     $compteur=0;
     while($row = $result->fetch_assoc()) {
	if($row["pseudo"]==$pseudo && $row["mdp"]==$mdp){
	echo "Vous etes bien connectés";
	$is_connected=true;
	}
       $compteur++;
     }
     echo"</table>";
  }
?>
</body>
</html>
