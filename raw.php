<?php

$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";

 $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
$sql = "SELECT titre, affiche FROM film";
  $result = $conn->query($sql);
echo"<table border = '2'>";
if ($result->num_rows > 0) {
     // output data of each row
     echo"<tr>";
     while($row = $result->fetch_assoc()) {

      echo"<td><img src=".$row["affiche"]." width='250px'>";
      echo"<br>".$row["titre"]."</td>";

     }
     echo "</tr>";
  }
  echo"</table>";
  $conn->close();

?>
