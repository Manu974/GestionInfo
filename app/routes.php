<?php

// Home page
$app->get('/', "GestionInfo\Controller\HomeController::indexAction")
->bind('home');

$app->get('/printer', "GestionInfo\Controller\HomeController::printerAction")
->bind('printer');

$app->get('/login', "GestionInfo\Controller\HomeController::loginAction")
->bind('login');