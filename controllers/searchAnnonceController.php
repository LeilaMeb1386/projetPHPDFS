<?php

session_start();


$annonce = findOneAnnonce($_POST['type']);
