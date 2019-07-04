<?php
session_start();
require_once('./db.php');
 $annonces = getAllAnnonces();
//var_dump($comments);die;
if (isset($_POST['email']) && isset($_POST['mp'])){
  $_SESSION['email']=$_POST['email'];
  $_SESSION['mp']=$_POST['mp'];

$name =$_SESSION['email'];
$user = getOneUser($_SESSION['email'], $_SESSION['mp']);
//var_dump($user);die;
$_SESSION['id'] = $user['id'];
$_SESSION['pseudo'] = $user['pseudo'];
$_SESSION['id_role'] = $user['id_role'];



  };

  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/home.css">
    <title></title>
  </head>
  <body>
    <header>

      <nav class="nav">
        <h1 class="Montitre">The Good Deal <h1/>
        <form class="formSearch" action="/searchAnnonce.php" method="post">
          <input type="text" name="type" placeholder="Rechercher des Annonces">
          <button class="buttonSearch" type="submit" name="button">
            <img class="imgSearch" src="./img/search.png">
          </button>
        </form>
      </nav>
      <div class="sara">
        <ul class="ul1">
          <li>
            <p class="pseudo_user"> <?php echo $_SESSION['pseudo']?></p>
          </li>

          <li>
            <a href="./home.php">Accueil</a>
          </li>
      
          <li>
            <a href="./insertAnnonce.php">Déposer une annonce</a>
          </li>
        </ul>
      </div>
      <div class="leila">


            <div class="dropdown">
              <button class="dropbtn"><img class="imgDropDown" src="./img/img.png"></button>
                <div class="dropdown-content">
                  <a href="./help.php">Mes annonces</a>
                  <a href="./settings.php">Paramètres</a>
                    <form action='./controllers/deleteAcountController.php' method='POST'>
                      <input type='hidden' name='id' value="<?php echo $user['id']?>">
                      <input class="delete" type='submit' value='Supprimer mon compte'>
                    </form>
                  <a href="./deconnexion.php">Deconnexion</a>
                </div>
              </div>
          </li>
        </ul>
      </div>
    </header>
    <main>

      <div class="actuality">
        <div class="fil">
          <h1>Annonces</h1>
        </div>

        <?php

    foreach($annonces as $key => $annonce):?>

      <div class='post'>
        <div class='actions'><?=$annonce['pseudo'] . " " . $annonce['date_poste'] ?></div>

        <div class='user-post'><?= $annonce['titre']?>
        </div>
        <div class='comment-post'><?= $annonce['type']?>
        </div>
        <div class='comment-post'><?= $annonce['contenu']?>
        </div>
        <?php if (isset($annonce['image'])):?>
        <div class='comment-post'>
        <img class='annonce-image' src='<?=$annonce['image']?>'>
        </div>

      <?php else:?>
        <p></p>
        <?php endif ?>
        <div class='actions'>
          <?php if($_SESSION['id_role'] == 1 || $_SESSION['id'] == $annonce['user_id']){?>
            <form action='./controllers/deleteAnnonceController.php' method='POST'>
            <input type='hidden' name='id' value="<?=$annonce['annonce_id']?>">
            <input class='delete' type='submit' value='Supprimer cette annonce'>
          </form>
                    <?php } ?>


        </div>

      </div>

    <?php endforeach


        ?>
      </div>


    </main>
    <footer></footer>
  </body>
  <script type="text/javascript" src="./js/script.js"></script>
</html>
