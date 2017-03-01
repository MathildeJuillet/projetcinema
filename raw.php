<?php

$servername = "192.168.101.66";
$username = "equipe";
$password = "coucou";
$dbname = "cinema";

 $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
$sql = "SELECT * FROM individu";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row

     while($row = $result->fetch_assoc()) {

       $compteur++;
     }
     echo"</table>";
  }
  else {
     echo "0 results";
  }
  $conn->close();
?>
