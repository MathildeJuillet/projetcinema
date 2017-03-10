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
    <div id ="rech">
    <form action="recherche.php" method="Post">
    <input type="text" name="nom" size="10" />
    <input type="submit" value="Ok">
    </form>
    </div>
    <div class="header" id="logo"></div>
  </div>

  <div class = "corps">
    <div class = "corps" id="mes_films_preferes">
        <h2>Films préférés, à revoir</h2>
          <?php
          $servername = "10.0.3.100";
          $username = "equipe";
          $password = "coucou";
          $dbname = "cinema";

           $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
          $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where revoir='1'";
            $result = $conn->query($sql);
          echo"<table border = '2'>";
          if ($result->num_rows > 0) {
               // output data of each row
               echo"<tr>";
               while($row = $result->fetch_assoc()) {

                echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
                echo"<br>".$row["titre"]."</td>";

               }
               echo "</tr>";
            }
            echo"</table>";
            $conn->close();

          ?>
    </div>
    <div class = "corps" id="mes_films_a_regarder">
        <h2>Films à regarder</h2>
        <?php
        $servername = "10.0.3.100";
        $username = "equipe";
        $password = "coucou";
        $dbname = "cinema";

         $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
          }
        $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where voir='1'";
          $result = $conn->query($sql);
        echo"<table border = '2'>";
        if ($result->num_rows > 0) {
             // output data of each row
             echo"<tr>";
             while($row = $result->fetch_assoc()) {

              echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
              echo"<br>".$row["titre"]."</td>";

             }
             echo "</tr>";
          }
          echo"</table>";
          $conn->close();

        ?>
    </div>
    <div class = "corps" id="mes_films_a_revoir">
        <h2>Films à faire découvrir</h2>
        <?php
        $servername = "10.0.3.100";
        $username = "equipe";
        $password = "coucou";
        $dbname = "cinema";

         $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
          }
        $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where decouvrir='1'";
          $result = $conn->query($sql);
        echo"<table border = '2'>";
        if ($result->num_rows > 0) {
             // output data of each row
             echo"<tr>";
             while($row = $result->fetch_assoc()) {

              echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
              echo"<br>".$row["titre"]."</td>";

             }
             echo "</tr>";
          }
          echo"</table>";
          $conn->close();

        ?>
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
