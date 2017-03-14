<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
    <div id="register_box">
      <p>Veuillez saisir vos informations : </p><br>
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
    $conn = connexion_bdd();

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
            header ('location: ma_page.php');
          }
        }
        $compteur++;
      }
      if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
      if(!isset($_SESSION['idu'])){
        echo "<p><span id='error'> ERREUR: Vos identifiants ne sont pas corrects </span></p>";
      }
    }
    }
    $conn->close();
    ?>
  </div>
</body>
</html>
