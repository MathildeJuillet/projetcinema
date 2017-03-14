<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
      <?php
      $conn = connexion_bdd();
      $id=$_GET['film'];
      $sql = "SELECT titre, affiche, lien, realisateur, excellent, bon, moyen, bof, mediocre, synopsis from notation inner join film on notation.idf=film.idf where film.idf=$id;
";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $titre=$row['titre'];
          $affiche=$row['affiche'];
          $lien=$row['lien'];
          $realisateur=$row['realisateur'];
          $excellent=$row['excellent'];
          $bon=$row['bon'];
          $moyen=$row['moyen'];
          $bof=$row['bof'];
          $mediocre=$row['mediocre'];
          $synopsis = $row['synopsis'];
        }
      }
      $moyenne=((($excellent*5)+($bon*4)+($moyen*3)+($bof*2)+($mediocre*1))/($excellent+$bon+$moyen+$bof+$mediocre));
      echo "<div class = 'corps' id='nom_film'>";
      echo "<h2>".$titre."<h2>";
      echo "</div>";
      echo "<div class = 'corps' id='affiche'>";
      echo "<img src='$affiche' width='260px'></img>";
      echo "</div>";
      echo "<div class = 'corps' id='notation'>";
      echo"<p>Notation</p><br>";
      echo"<p>Moyenne : $moyenne/5</p>";
      echo "</div>";
      echo "<div class = 'corps' id='bande_annonce'>";
      echo "<iframe width='560' height='315' src='$lien' frameborder='0' allowfullscreen></iframe>"; //Le lien n'est pas bon il faut du embed
      echo "</div>";
      echo "<div class = 'corps' id='casting'>";
      echo "<h2>Réalisateur :</h2><br><p>$realisateur<p>";
      $sql1="SELECT film.idf, acteur.ida, acteur.nom, acteur.prenom from film_acteur inner join film on film_acteur.idf=film.idf inner join acteur on film_acteur.ida=acteur.ida where film.idf='$id'";
      $result = $conn->query($sql1);
      echo"<br><h2>Acteurs :</h2><br>";
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $nom=$row['nom'];
          $prenom=$row['prenom'];
          echo "<p>$nom $prenom</p><br>";
        }
      }
      echo "<div class = 'corps' id='synopsis'>";
      echo "<img src='$synopsis'/>";
      echo "</div>";
      $conn->close();
      echo "</div>";
      ?>

    <!--<div class = "corps" id="synopsis">
      <p>div synopsis<p>
      </div>-->
      <div class = "corps" id="boutons">
        <form id="ajout_bouton" method="post" enctype="multipart/form-data">
          <p>Combien d'étoiles pour ce film ?</p>
          <input type='submit' name='5S' value='5' class="star_button">
          <input type='submit' name='4S' value='4' class="star_button">
          <input type='submit' name='3S' value='3' class="star_button">
          <input type='submit' name='2S' value='2' class="star_button">
          <input type='submit' name='1S' value='1' class="star_button"><br>
          <p>Tu peux l'ajouter dans une ou plusieurs liste :</p>
          <input type='submit' name='voir' value='A voir'>
          <input type='submit' name='revoir' value='A revoir'>
          <input type='submit' name='decouvrir' value='A faire découvrir'>
        </form>
        <?php
        $conn = connexion_bdd();

        $id=$_GET['film'];
        if(isset($_SESSION['idu'])){
          $idu=$_SESSION['idu'];
          //----- Les listes -----
          if (isset($_POST['voir'])) {
            $sql="insert into liste (idu, idf, voir) values ('$idu','$id', 1)";
          }
          if (isset($_POST['revoir'])) {
            $sql="insert into liste (idu, idf, revoir) values ('$idu','$id',1)";
          }
          if (isset($_POST['decouvrir'])) {
            $sql="insert into liste (idu, idf, decouvrir) values ('$idu','$id',1)";
          }
          if($conn->query($sql)==TRUE){
          }
          //----- Les etoiles -----
          if (isset($_POST['5S'])) {
            $note='excellent';
          }
          if (isset($_POST['4S'])) {
            $note='bon';
          }
          if (isset($_POST['3S'])) {
            $note='moyen';
          }
          if (isset($_POST['2S'])) {
            $note='bof';
          }
          if (isset($_POST['1S'])) {
            $note='mediocre';
          }
          if(isset($_POST['1S']) || isset($_POST['2S']) || isset($_POST['3S']) || isset($_POST['4S']) || isset($_POST['5S'])){
            $sql="SELECT $note from notation where idf='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                $compteur=$row["$note"]+1;
                $sql="UPDATE notation SET $note='$compteur' where idf='$id'";
              }
            }
            else {
              $sql="INSERT INTO notation ($note, idf) values ('1', '$id')";
            }
            if($conn->query($sql)==TRUE){
            }
          }
        }
        $conn->close();
        ?>
        </div>
        </div>

        </div>
      </body>

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
