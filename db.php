<?php
function getOneUser($email, $mp) {
  $connec = new PDO('mysql:dbname=LeBonCoin', 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT id,pseudo,email, mp, id_role  FROM users WHERE email = :email AND mp = :mp;");
  $request->execute([
    ":email" => $email,
    ":mp" => $mp,
  ]);

  return $request->fetch(PDO::FETCH_ASSOC);
}


// function getOneUser($email, $mp) {
//   $connec = new PDO('mysql:dbname=LeBonCoin', 'root', '0000');
//   $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $request = $connec->prepare("SELECT id,pseudo,email, mp, id_role  FROM users WHERE email = :email AND mp = :mp;");
//   $request->bindParam(":email", $email);
//   $request->bindParam(":mp", $mp);
//   $request->execute();
//   $user = $request->fetch(PDO::FETCH_ASSOC);
//   if($user) {
//     session_start();
//     $_SESSION['user'] = $user;
//     return $user;
//   } else {
//     header('Location: /404.php');die;
//   }
// }

function insertUser($pseudo, $email, $mp, $id_role){
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("INSERT INTO users(pseudo,email, mp,id_role) VALUES (:pseudo , :email, :mp,:id_role );");

  $request->execute([
    ":pseudo" => $pseudo,
    ":email" => $email,
    ":mp" => $mp,
    ":id_role" => $id_role,
  ]);
}

function getAllAnnonces(){
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $request = $connec->prepare("select annonces.id as annonce_id, titre, contenu ,image, date_poste, pseudo, users.id as user_id, type, types.id as type_id from annonces inner join users on users.id=user_id inner join types on types.id=type_id;");
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}


function getAllTypes() {
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $request = $connec->prepare("SELECT * FROM types;");
  $request->execute();
  return $request->fetchAll();
}

function insertAnnonce( $titre, $contenu, $image,  $type, $user_id){
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("INSERT INTO annonces(titre, contenu,image,type_id, user_id ) VALUES (:titre,:contenu, :image, :type, :user_id);");

  $request->execute([
      ":titre" => $titre,
      ":contenu" => $contenu,
      ":image" => $image,
      ":type" => $type,
      ":user_id" => $user_id,

  ]);
}
function findOneAnnonce($type) {
  $connec = new PDO('mysql:dbname=LeBonCoin', 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT annonces.id as annonce_id, titre, contenu ,image, date_poste, pseudo, users.id as user_id, type, types.id as type_id from annonces inner join users on users.id=user_id inner join types on types.id=type_id WHERE type = :type;");
  $request->execute([
    ":type" => $type,
  ]);
  return $request->fetchAll(PDO::FETCH_ASSOC);
}

function deleteUser($id){
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("DELETE FROM users WHERE id = :id ;");
  $request->execute([
    ":id" => $id,
  ]);
}

function deleteAnnonce($id){
  $connec = new PDO("mysql:dbname=LeBonCoin", 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// cette ligne de code permet d'fficher les erreurs PDO
  $request = $connec->prepare("DELETE FROM annonces WHERE id = :id ;");
  $request->execute([
    ":id" => $id,
  ]);
}
