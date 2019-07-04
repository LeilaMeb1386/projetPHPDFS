<?php
require_once('../db.php');
deleteUser($_POST['id']);
//var_dump($_POST['id']);die;
header('Location: /index.php');die;
