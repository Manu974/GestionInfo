<?php

// Home page
$app->get('/', "GestionInfo\Controller\HomeController::indexAction")
->bind('home');