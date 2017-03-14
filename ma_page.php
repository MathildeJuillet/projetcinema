<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
    <div class = "corps" id="bienvenu">
      <?php
      echo "<h2>Bienvenu ".$_SESSION['login']." sur Orange Mech'anique !";
      if ($_SESSION['login']=='benji' || $_SESSION['login']=='Admin') {
        echo "<a href='ajout_film.php'><div class='button'>Ajouter film</div></a><br>";
        echo "<a href='modifie.php'><div class='button'>Modifier lien yt</div></a>";
      }
      ?>
    </div>
    <div class = "corps" id="mes_films_preferes">
        <h2>Films préférés, à revoir</h2>
          <?php
          $conn = connexion_bdd();
          $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where revoir='1' and idu='".$_SESSION['idu']."'";
          $result = $conn->query($sql);
          echo"<table border = '2'>";
          if ($result->num_rows > 0) {
               // output data of each row
               echo"<tr>";
               while($row = $result->fetch_assoc()) {
                echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
                echo"<br>".$row["titre"]."<br><a href='suppression.php?film=".$row['idf']."&type=revoir'><img src='croix.png' width='15px'></img></a></td>";
               }
               echo "</tr>";
            }
            echo"</table>";
            $conn->close();

          ?>
          <a href="suite.php?type=1">Voir la suite ...</a>
    </div>
    <div class = "corps" id="mes_films_a_regarder">
        <h2>Films à regarder</h2>
        <?php
        $conn = connexion_bdd();
        $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where voir='1' and idu='".$_SESSION['idu']."'";
          $result = $conn->query($sql);
        echo"<table border = '2'>";
        if ($result->num_rows > 0) {
             // output data of each row
             echo"<tr>";
             while($row = $result->fetch_assoc()) {

              echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
              echo"<br>".$row["titre"]."<br><a href='suppression.php?film=".$row['idf']."&type=revoir'><img src='croix.png' width='15px'></img></a></td>";

             }
             echo "</tr>";
          }
          echo"</table>";
          $conn->close();
        ?>
        <a href="suite.php?type=2">Voir la suite ...</a>
    </div>
    <div class = "corps" id="mes_films_a_revoir">
        <h2>Films à faire découvrir</h2>
        <?php
        $conn = connexion_bdd();
        $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where decouvrir='1' and idu='".$_SESSION['idu']."'";
          $result = $conn->query($sql);
        echo"<table border = '2'>";
        if ($result->num_rows > 0) {
             // output data of each row
             echo"<tr>";
             while($row = $result->fetch_assoc()) {
              echo"<td><a href='page_produit.php?film=".$row['idf']."'><img src=".$row["affiche"]." width='150px'></a>";
              echo"<br>".$row["titre"]."<br><a href='suppression.php?film=".$row['idf']."&type=revoir'><img src='croix.png' width='15px'></img></a></td>";

             }
             echo "</tr>";
          }
          echo"</table>";
          $conn->close();
        ?>
        <a href="suite.php?type=3">Voir la suite ...</a>
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
