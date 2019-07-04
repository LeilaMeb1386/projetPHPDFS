<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
          <h1 class="Montitre">The Good Deal<h1/>
             <h2>Se connecter </h2>
            <form action="/home.php" method="post">
                <input required name="email" type="text" placeholder="Adresse e-mail">
                <input required name="mp" type="password" placeholder="Mot de passe">
                <input value="Connexion" type="submit">
            </form>
        </div>
    </header>
    <main>
        <div class="main-container">

        </div>
        <div class="second-container">
          <div class="carte">
            <img src="">
          </div>
            <form class="inscription" action="./controllers/InsertUserController.php" method="post">
                <h1>Créer un compte</h1>
                <div>
                   <div>
                      <input required class="semi" name="pseudo" type="text" placeholder="Pseudo">
                    </div>
                    <div class="input-full-width">
                       <input required class="full" name="email" type="text" placeholder="e-mail">
                       <input required class="full" name="mp" type="password" placeholder="Nouveau mot de passe">
                     </div>
                       <input name="id_role" type="hidden" value="2">
                       <br>
                       <br>
                       <input class="submit" type="submit" value="créer mon compte">
            </form>
          </div>
        </div>
     </main>
     <footer>
       <img class="footer" src="img/footer.png" alt="">
     </footer>
</body>
</html>
