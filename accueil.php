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
    <div class="button" id="connexion"></div>
    <div class="button" id="recommandes"></div>
    <div class="button" id="new"></div>
    <div class="button" id="ma_page"></div>
    <div id="devise">On pourrait mettre une devise ici</div>
    <div id ="rech">
     <form action="recherche.php" method="Post">
     <input type="text" name="requete" size="10">
     <input type="submit" value="Ok">
     </form>
    </div>
    <div class="header" id="logo"></div>
  </div>
  <div class = "corps">
    <div class = "corps" id="nouveautes">
        <p>div nouveautés<p>
          <?php

          $servername = "10.0.3.100";
          $username = "equipe";
          $password = "coucou";
          $dbname = "cinema";

           $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
          $sql = "SELECT titre, affiche FROM film";
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
    <div class = "corps" id="tires_au_hasard">
        <p>div tirés au hasard<p>
          <?php

          $servername = "10.0.3.100";
          $username = "equipe";
          $password = "coucou";
          $dbname = "cinema";
          $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
                echo"<table border = '2'>";
                echo"<tr>";
                for($i = 0; $i<=4; $i++ )
                {
                $nb_rand =rand(1,6);
                $sql = "SELECT idf,titre, affiche FROM film where idf=".$nb_rand;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                     // output data of each row
                     while($row = $result->fetch_assoc()) {
                echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
                echo"<br>".$row["titre"]."</td>";
                     }
                  }
                }
                echo "</tr>";
                echo"</table>";
              $conn->close();
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
