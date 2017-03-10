<?php
session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styleT.css" />
    <title>Orange Mech'anique</title>
</head>
<body>
  <div class="header">
      <a href='accueil.php'><div class="button" id="accueil">Accueil</div></a>
      <?php
      if (isset($_SESSION['login'])) {
        echo "<a href='deconnexion.php'><div class='button' id='connexion'>Deconnexion</div></a>";
      }
      else {
        echo "<a href='connexion.php'><div class='button' id='connexion'>Connexion</div></a>";
      }
      ?>
      <a href='recommandes.php'><div class="button" id="recommandes">Recommandés</div></a>
      <a href='noueautes.php'><div class="button" id="new">Nouveautés</div></a>
      <?php
      if (isset($_SESSION['login'])) {
        echo "<a href='ma_page.php'><div class='button' id='ma_page'>Ma page</div></a>";
      }
      else {
        echo "<a href='register.php'><div class='button' id='ma_page'>S'inscrire</div></a>";
      }
      ?>
    <div id="devise">Orange Mech'Anique</div>
    <div id ="rech">
      <form action="recherche.php" method="Post">
        <input type="text" name="requete" size="10">
        <input type="submit" value="Ok">
      </form>
    </div>
    <div class="header" id="logo"></div>
  </div>
  <div class = "corps">
    <div id="register_box">
      <p>Veulliez saisir vos informaions : </p><br>
      <form id="formulaire" method="post" enctype="multipart/form-data">
        Pseudo<br>
        <input type="text" name="pseudo"><br><br>
        Mot de passe<br>
        <input type="password" name="mdp"><br><br>
        <input type="submit" value="Login">
      </form>
    </div>
    <?php
    if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
      $pseudo=$_POST["pseudo"];
      $mdp=$_POST["mdp"];
    }
    $servername = "10.0.3.100";
    $username = "equipe";
    $password = "coucou";
    $dbname = "cinema";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT pseudo, mdp, idu FROM utilisateur";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $compteur=0;
      while($row = $result->fetch_assoc()) {
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
          if($row["pseudo"]==$pseudo && $row["mdp"]==$mdp){
            echo "Vous etes bien connectés";
            $_SESSION['login']=$pseudo;
            $_SESSION['idu']=$row['idu'];
            echo $_SESSION['idu'];
            //header ('location: accueil.php');
          }
        }
        $compteur++;
      }
      echo"</table>";
    }
    ?>
  </div>
</body>
</html>
