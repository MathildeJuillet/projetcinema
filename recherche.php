<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
<?php
$asked = $_POST['nom'];
$conn = connexion_bdd();
//$conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT idf,titre, affiche,realisateur  FROM film WHERE titre LIKE '%".$asked ."%' ORDER BY titre";
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
