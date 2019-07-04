<?php
require_once('../db.php');
deleteAnnonce($_POST['id']);
header('Location: /home.php');die;
