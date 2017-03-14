<?php
session_start();
include 'api.php';
afficher_menu();
$larg = 6;
?>
  <div class = "corps">
    <div class = "corps" id="tous_films">
        <h2>Tous les films</h2>
         <?php
          $conn = connexion_bdd();
          $sql = "SELECT titre, idf, affiche FROM film";
          $nb_film ="select count (titre) from film";
          $result = $conn->query($sql);
          echo"<table border = '2'>";

                if ($result->num_rows > 0) 
                {
                  $i=1;
                     // output data of each row
                     while($row = $result->fetch_assoc()) {
                     
                        if ($i%$larg == 1)
                        {
                        echo "<tr>";
                        }
                              echo"<td><a href='page_produit.php?film=".$row['idf']."'>
                              <img src=".$row["affiche"]." width='150px'></a>";
                              echo"<br>".$row["titre"]."</td>";
                          if ( $i%$larg== 0)
                          {
                          echo "</tr>";
                          }
                          $i++; 
                     }
                     if ($i%$larg != 0)
                     {
                      $k = ($larg+1)-$i%$larg;
                      echo "<!-- $k-->";
                      for ($j=0 ; $j<$k; $j++)
                      {

                        echo "<td> </td>";
                      }
                      echo "</tr>";
                     }
                   }
                  
                echo"</table>";
        
            $conn->close();
          ?>  
    </div>
  </div>
  <div class= "footer">
    <p>ceci est un footer</p>
    <div class="footer" id="Facebook">
  </div>
  <div class="footer" id="Twitter">
  </div>
  <div class="footer" id="mentions_legales">
    <h5> Mentions légales</h5>
  </div>
  </div>

</html>
