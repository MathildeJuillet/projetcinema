<?php
function connexion_bdd(){
  $servername = "192.168.0.19";
  $username = "equipe";
  $password = "coucou";
  $dbname = "cinema";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function afficher_menu(){
  echo "<!DOCTYPE html>";
 echo "<html>";
  echo "<head>";
     echo "<meta charset='utf-8' />";
      echo "<link rel='stylesheet' href='styleT.css' />";
      echo "<title>Orange Mech'anique</title>";
  echo "</head>";
  echo "<body>";
   echo " <div class='header'>";
        echo "<a href='accueil.php'><div class='button' id='accueil'>Accueil</div></a>";
       if (isset($_SESSION['login'])) {
         echo "<a href='ma_page.php'><div class='button' id='connexion'>Ma Page</div></a>";
       }
       else {
         echo "<a href='connexion.php'><div class='button' id='connexion'>Connexion</div></a>";
       }
        echo "<a href='recommandes.php'><div class='button' id='recommandes'>Recommandés</div></a>";
        echo "<a href='noueautes.php'><div class='button' id='new'>Nouveautés</div></a>";
       if (isset($_SESSION['login'])) {
         echo "<a href='deconnexion.php'><div class='button' id='ma_page'>Deconnexion</div></a>";
       }
       else {
         echo "<a href='register.php'><div class='button' id='ma_page'>S'inscrire</div></a>";
       }
      echo "<div id='devise'>Orange Mech'anique</div>";
      echo "<div id ='rech'>";
      echo"<form action='recherche.php' method='Post'>";
      echo"<input type='text' name='nom' size='10' />";
      echo"<input type='submit' value='Ok'>";
      echo"</form>";
      echo"</div>";
      echo"<div class='header' id='logo'></div>";
    echo"</div>";
}
?>
