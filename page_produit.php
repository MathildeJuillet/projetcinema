<?php
session_start();
include 'api.php';
afficher_menu();
?>
  <div class = "corps">
<?php
      $conn = connexion_bdd();
      $id=$_GET['film'];
      $sql = "SELECT titre, affiche, lien, realisateur, excellent, bon, moyen, bof, mediocre from notation inner join film on notation.idf=film.idf where film.idf=$id;
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
        }
      }
      $conn->close();
      echo "<div class = 'corps' id='nom_film'>";
      echo "<h2>".$titre."<h2>";
      echo "</div>";
      echo "<div class = 'corps' id='affiche'>";
      echo "<img src='$affiche' width='260px'></img>";
      echo "</div>";
      echo "<div class = 'corps' id='bande_annonce'>";
      echo "<iframe width='560' height='315' src='$lien' frameborder='0' allowfullscreen></iframe>"; //Le lien n'est pas bon il faut du embed
      echo "</div>";
      echo "<div class = 'corps' id='casting'>";
      echo "<p>Réalisateur : <br>$realisateur<p>";
      echo "</div>";
      ?>

    <div class = "corps" id="synopsis">
      <p>div synopsis<p>
      </div>
      <div class = "corps" id="boutons">
        <form id="ajout_bouton" method="post" enctype="multipart/form-data">
          <p>Combien d'étoiles pour ce film ?</p>
          <input type='radio' name='star' value='5S'>5
          <input type='radio' name='star' value='4S'>4
          <input type='radio' name='star' value='3S'>3
          <input type='radio' name='star' value='2S'>2
          <input type='radio' name='star' value='1S'>1<br>
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
