<?php

session_start();

require_once('../db.php');

insertAnnonce($_POST['titre'], $_POST['contenu'],$_POST['image'],$_POST['type'], $_POST['user_id']);
header('Location: /home.php');die;
