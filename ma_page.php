<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styleT.css" />
    <title>Nom du site</title>
</head>
<body>
  <div class="header">
    <div class="button" id="accueil">Accueil</div>
    <div class="button" id="connexion">Connexion</div>
    <div class="button" id="recommandes">Recommandés</div>
    <div class="button" id="new">Nouveautés</div>
    <div class="button" id="ma_page">Ma page</div>
    <div id="devise">On pourrait mettre une devise ici</div>
    <div id ="rech">
    <form action="recherche.php" method="Post">
    <input type="text" name="nom" size="10" />
    <input type="submit" value="Ok">
    </form>
    </div>
    <div class="header" id="logo"></div>
  </div>

  <div class = "corps">
    <div class = "corps" id="mes_films_preferes">
        <p>Films préférés<p>
    </div>
    <div class = "corps" id="mes_films_a_regarder">
        <p>Films à regarder<p>
    </div>
    <div class = "corps" id="mes_films_a_revoir">
        <p>Films à revoir<p>
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