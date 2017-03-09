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
    <div class="button" id="ma_page">Ma page</div>
    <div id="devise">On pourrait mettre une devise ici</div>
    <div id ="rech"></div>
    <div class="header" id="logo"></div>
  </div>

  <div class = "corps">
      <?php
      $servername = "10.0.3.100";
      $username = "equipe";
      $password = "coucou";
      $dbname = "cinema";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $id=$_GET['film'];
      $sql = "SELECT * FROM film WHERE idf=$id";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $titre=$row['titre'];
          $affiche=$row['affiche'];
          $lien=$row['lien'];
          $realisateur=$row['realisateur'];
        }
      }
      $conn->close();
      echo "<div class = 'corps' id='nom_film'>";
      echo "<h2>".$titre."<h2>";
      echo "</div>";
      echo "<div class = 'corps' id='affiche'>";
      echo "<img src='$affiche' width='260px'></img>";
      echo "</div>";
      echo "<div class = 'corps' id='bande_annonce'>";
      echo "<iframe width='560' height='315' src='$lien' frameborder='0' allowfullscreen></iframe>"; //Le lien n'est pas bon il faut du embed
      echo "</div>";
      echo "<div class = 'corps' id='casting'>";
      echo "<p>Réalisateur : <br>$realisateur<p>";
      echo "</div>";
      ?>

    <div class = "corps" id="synopsis">
      <p>div synopsis<p>
      </div>
        </div>
        <div class = "corps" id="boutons">
          <p>div boutons<p>
          </div>
        </div>
      </body>

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
