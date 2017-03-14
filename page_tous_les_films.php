<?php
session_start();
include 'api.php';
afficher_menu();
$larg = 6;
?>
    <div class = "corps" id="tous_films">
        <h2>Tous les films</h2>
         <?php
          $sql = "SELECT titre, idf, affiche FROM film";
          $type=0;
          afficher_colonne($sql, 'null');
          ?>
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
