<?php
session_start();
include 'api.php';
afficher_menu();
?>
	<div id="register_box">
	<form id="formulaire" method="post" enctype="multipart/form-data">
		Nom<br>
		<input type="text" name="nom"><br><br>
		Prenom<br>
		<input type="text" name="prenom"><br><br>
		E-mail<br>
		<input type="text" name="email"><br><br>
		Pseudo<br>
		<input type="text" name="pseudo"><br><br>
		Mot de passe<br>
		<input type="password" name="mdp1"><br><br>
		Resaisir mot de passe<br>
		<input type="password" name="mdp2"><br><br>
	<input type="submit" value="S'inscrire">
	</form>
	</div>
<?php

$conn = connexion_bdd();
if(isset($_POST["email"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["pseudo"]) && isset($_POST["mdp1"]) && isset($_POST["mdp2"])){
  $courriel=$_POST["email"];
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $pseudo=$_POST["pseudo"];
  $mdp1=$_POST["mdp1"];
  $mdp2=$_POST["mdp2"];

  if (filter_var($courriel, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z ]*$/",$nom) && preg_match("/^[a-zA-Z ]*$/",$prenom) && $mdp1==$mdp2) {

  $sql="insert into utilisateur (nom, prenom, email, pseudo, mdp) values ('$nom','$prenom','$courriel','$pseudo', '$mdp1')";
    if($conn->query($sql)==TRUE){
    echo"Merci de votre enregistrement";
    $_SESSION['login']=$pseudo;
    $_SESSION['idu']=$row['idu'];
    header ('location: ma_page.php');
    }
  }
}
?>
</body>
</html>
