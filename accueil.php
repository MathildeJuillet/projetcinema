<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
    <div class = "corps" id="nouveautes">
        <h2>Nouveautés</h2>
          <?php
            $conn = connexion_bdd();
          $sql = "SELECT titre, idf, affiche FROM film";
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
        <h2>Films au hasard</h2>
          <?php
            $conn = connexion_bdd();
                echo"<table border = '2'>";
                echo"<tr>";
                for($i = 0; $i<=5; $i++ )
                {
                $sql="select count(titre) from film";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()){
                    $nbr_film=$row['count(titre)'];
                  }
                }
                $nb_rand =rand(1,$nbr_film);
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
