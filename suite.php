<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps" id="voir_la_suite">
  <?php
  $conn = connexion_bdd();
  $type=$_GET['type'];
  if ($type==1) {
    $type='revoir';
    $titre_div='Mes films à revoir';
  }
  if ($type==2) {
    $type='voir';
    $titre_div='Mes films à voir';
  }
  if ($type==3) {
    $type='decouvrir';
    $titre_div='Mes films à découvrir';
  }
  $sql = " select liste.idu, film.idf, revoir, titre, affiche from liste inner join film on liste.idf=film.idf where $type='1' and idu='".$_SESSION['idu']."'";
  afficher_colonne($sql, $type);
  $conn->close();
  ?>
</div>
</body>
</html>
