<?php
session_start();
require_once('./db.php');
 $annonces = getAllAnnonces();
 $types = getAlltypes();
//var_dump($comments);die;
if (isset($_POST['email']) && isset($_POST['mp'])){
  $_SESSION['email']=$_POST['email'];
  $_SESSION['mp']=$_POST['mp'];
$name =$_SESSION['email'];
$user = getOneUser($_SESSION['email'], $_SESSION['mp']);
//var_dump($user['id']);die;
$_SESSION['id'] = $user['id'];
$_SESSION['pseudo'] = $user['pseudo'];
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
        <h1 class="Montitre">The Good Deal<h1/>
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
          <li>
            <div class="dropdown">
              <button class="dropbtn"><img class="imgDropDown" src="./img/img.png"></button>
                <div class="dropdown-content">
                  <a href="./help.php">Mes annonces</a>
                    <form action='./actions/deleteAcountAction.php' method='POST'>
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


       <form class="formPublication" action="./controllers/insertAnnonceController.php" method="post">
         <input type="hidden" name="user_id" value="<?php $_SESSION['id'] ?>">
         <div class="insert">

         <div class="t">
         <label for="">Titre de votre annonce</label>
         <input type="text" name="titre" value="">
       </div>

       <div class="cate">

         <label for="">Catégories</label>
     <select class="" name="type">
       <?php
         foreach ($types as $type) {
           $id = $type['id'];
           $type = $type['type'];
           echo "<option value='$id'>$type</option>";
         }
       ?>
     </select>
     <label>Insérer une image</label>
   <input type="text" name="image" class='annonce-image' >
   </div>
   </div>
   <br>
      <div class="conim">

        <div class="textare">
       <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
       <textarea placeholder="votre contenu..." name="contenu" rows="8" cols="80"></textarea>
     </div>
     <br>


     </div>



    <button class="buttonPublier" type="submit" name="button">Publier</button>

  </form>
</div>
</div>

    </main>
  </body>

</html>
