
<?php
include 'api.php';
$conn = connexion_bdd();
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT titre, affiche,realisateur  FROM film WHERE titre LIKE '%".$asked ."%' ORDER BY titre";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
       // output data of each row
       echo "<div id='result'><table><tr>";
       while($row = $result->fetch_assoc()) {
        echo"<td><img src=".$row['affiche']." width='150px'></td>";
        echo "<td><a href='page_produit.php?film=".$row['idf']."'> ".$row['titre']."</a><br>";
        echo $row['realisateur']."</td></tr>";
       }
       echo "</table></div>";
     }
?>
</div>
