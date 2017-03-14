<?php
session_start();
include 'api.php';
afficher_menu();
?>
<div class="corps" id="ajouter_acteur">
<form id="ajout" method="post" enctype="multipart/form-data">
  ID film<br>
  <input type="text" name="idf"><br><br>
  Nom Acteur 1<br>
  <input type="text" name="nomact1"><br><br>
  Prenom Acteur 1<br>
  <input type="text" name="prenomact1"><br><br>
  Nom Acteur 2<br>
  <input type="text" name="nomact2"><br><br>
  Prenom Acteur 2<br>
  <input type="text" name="prenomact2"><br><br>
<input type="submit" value="Ajouter">
<?php
	$conn = connexion_bdd();
  if (isset($_POST['idf']) && isset($_POST['nomact1']) && isset($_POST['prenomact2']) && isset($_POST['nomact2']) && isset($_POST['prenomact1'])) {
    $idf=$_POST['idf'];
    $nom1=$_POST['nomact1'];
    $prenom2=$_POST['prenomact2'];
    $nom2=$_POST['nomact2'];
    $prenom1=$_POST['prenomact1'];

    $sql="insert into acteur (nom, prenom) values ('$nom1', '$prenom1')";
    if($conn->query($sql)==TRUE){
      echo"OK";
    }
    $sql="insert into acteur (nom, prenom) values ('$nom2', '$prenom2')";
    if($conn->query($sql)==TRUE){
      echo"OK";
    }

    $sql="SELECT ida from acteur where nom='$nom1' && prenom='$prenom1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $ida1=$row['ida'];
      }
    }
  	$sql="insert into film_acteur (idf, ida) values ('$idf', '$ida1')";
  	if($conn->query($sql)==TRUE){
  	  echo"OK";
  	}

    $sql="SELECT ida from acteur where nom='$nom2' && prenom='$prenom2'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $ida2=$row['ida'];
      }
    }
    $sql="insert into film_acteur (idf, ida) values ('$idf', '$ida2')";
    if($conn->query($sql)==TRUE){
      echo"OK";
    }
  }
?>
</div>
</body>
</html>
