<?php
session_start();
include 'api.php';
afficher_menu();
?>
<div class = "corps">
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
  $result = $conn->query($sql);
  echo "<br><h2>$titre_div</h2><br><br>";
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
</div>
</div>
</body>
</html>
