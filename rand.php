<?php

$servername = "10.0.3.100";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";
$conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
      echo"<table border = '2'>";
      echo"<tr>";
      for($i = 0; $i<=4; $i++ )
      {
      $nb_rand =rand(1,6);
      $sql = "SELECT idf,titre, affiche FROM film where idf=".$nb_rand;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
            echo"<td><img src=".$row["affiche"]." width='150px'>";
            echo"<br>".$row["titre"]."</td>";
           }
        }
      }
      echo "</tr>";
      echo"</table>";
    $conn->close();
?>
