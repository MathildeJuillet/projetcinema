<?php
function connexion_bdd(){
  $servername = "10.0.3.100";
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
        echo "<a href='page_tous_les_films.php'><div class='button' id='recommandes'>Tous les films</div></a>";
        echo "<a href='page_nouveautes.php'><div class='button' id='new'>Nouveautés</div></a>";
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
      echo"<div class='header' id='logo'><img id='logo_cine' src='logo.png'/></div>";
    echo"</div>";
}
function afficher_colonne($sql, $type){
  $larg = 6;
  $conn = connexion_bdd();
  $nb_film ="select count (titre) from film";
  $result = $conn->query($sql);
  $compteur=0;
  if($type=='revoir' || $type=='voir'){
    echo"<h2>mes films à $type</h2>";
  }
  if($type=='decouvrir'){
      echo"<h2>mes films à faire découvrir</h2>";
  }
  echo"<table border = '2'>";

        if ($result->num_rows > 0)
        {
          $i=1;
             // output data of each row
             while($row = $result->fetch_assoc()) {

                if ($i%$larg == 1)
                {
                echo "<br><tr>";
                }
                      echo"<td><a href='page_produit.php?film=".$row['idf']."'>
                      <img src=".$row["affiche"]." width='150px'></a>";
                      if($type=='revoir' || $type=='voir' || $type=='decouvrir'){
                        echo $row["titre"]."<br><a href='suppression.php?film=".$row['idf']."&type=$type'><img src='croix.png' width='15px'></img></a></td>";
                      }
                      elseif($type=='null'){
                        echo"<br>".$row["titre"]."</td>";
                      }
                  if ( $i%$larg== 0)
                  {
                  echo "</tr>";
                  $compteur++;
                  }
                  $i++;
             }
             if ($i%$larg != 0)
             {
              $k = ($larg+1)-$i%$larg;
              echo "<!-- $k-->";
              for ($j=0 ; $j<$k; $j++)
              {

                echo "<td> </td>";
              }
              echo "</tr>";
             }
           }

        echo"</table>";

    $conn->close();
    $pixels=310*($compteur+1);
    echo "<style type='text/css'>";
    echo"#tous_films, #voir_la_suite{";
    echo"background-color: #FFD34A;";
    echo"height: $pixels"."px;";
    echo"width: 95%;";
    echo"right: 5%;";
    echo"left: 3%;";
    echo"top: 20%;";
    echo "box-shadow: -1px 2px 5px 1px rgba(0, 0, 0, 0.7);";
    echo"bottom: auto;}";
    echo"</style>";
}

?>
