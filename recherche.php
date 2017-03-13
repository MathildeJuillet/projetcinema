<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styleT.css" />
    <title>Nom du site</title>
</head>
<body>
  <div class="header">
      <div class="button" id="accueil">Accueil</div>
      <div class="button" id="connexion">Connexion</div>
      <div class="button" id="recommandes">Recommandés</div>
      <div class="button" id="new">Nouveautés</div>
      <div class="button" id="ma_page">Ma</div>

    <div id="devise">On pourrait mettre une devise ici</div>
    <div id ="rech">
    <form action="recherche.php" method="Post">
    <input type="text" name="nom" size="10" />
    <input type="submit" value="Ok">
    </form>
    </div>
    <div class="header" id="logo"></div>
    </div>

  </div>
  <div class = "corps">
<?php
$asked = $_POST['nom'];
$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";

$conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT idf,titre, affiche,realisateur  FROM film WHERE titre LIKE '%".$asked ."%' ORDER BY titre";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
       // output data of each row
       echo "<div id='result'><table><tr>";
       while($row = $result->fetch_assoc()) {
        echo"<td><img src=".$row['affiche']." width='150px'></td>";
        echo "<td><a href='page_produit.php?film=".$row['idf']."'> ".$row['titre']."</a><br>";
        echo $row['realisateur']."</td></tr>";
       }
       echo "</table></div>";
     }
?>
</div>
</div>
<div class= "footer">
  <p>ceci est un footer</p>
  <div class="footer" id="Facebook">
  <p> div Facebook</p>
</div>
<div class="footer" id="Twitter">
  <p> div Twitter</p>
</div>
<div class="footer" id="mentions_legales">
  <p> div mentions légales</p>
</div>
</div>

</html>
