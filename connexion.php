<?php
session_start();
 ?>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styleT.css" />
  <title>Nom du site</title>
</head>
<body>
  <div class="header">
    <div class="button" id="accueil">Accueil</div>
    <div class="button" id="connexion"></div>
    <div class="button" id="recommandes"></div>
    <div class="button" id="new"></div>
    <div class="button" id="ma_page"></div>
    <div id="devise">On pourrait mettre une devise ici</div>
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

    $sql = "SELECT pseudo, mdp FROM utilisateur";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $compteur=0;
      while($row = $result->fetch_assoc()) {
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
          if($row["pseudo"]==$pseudo && $row["mdp"]==$mdp){
            echo "Vous etes bien connectés";
            $_SESSION['login']=$pseudo;
            header ('location: accueil.php');
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
