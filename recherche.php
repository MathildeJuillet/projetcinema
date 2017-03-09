<?php
$asked = $_POST['nom'];
$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";

$conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT titre FROM film WHERE titre LIKE '%".$asked ."%' ORDER BY titre";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
        echo "<a href='fonction.php?id='".$row['titre']."'> ".$row['titre']."</a><br>";
       }
     }

?>
