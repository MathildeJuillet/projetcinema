
<?php
$asked = $_POST['nom'];
$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";

$conn = new mysqli($servername, $username, $password, $dbname);
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
