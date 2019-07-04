<?php

require_once('../db.php');
insertUser($_POST['pseudo'],  $_POST['email'], $_POST['mp'], $_POST['id_role']);
header('Location: /home.php');die;
