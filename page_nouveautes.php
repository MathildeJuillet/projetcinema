<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
    <div class = "corps" id="toutes_nouveautes">
        <h2>Nouveautés</h2>
         <?php
            $conn = connexion_bdd();
          $sql = "SELECT titre, idf, affiche FROM film order by idf desc limit 6";
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
