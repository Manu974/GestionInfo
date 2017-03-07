<?php

// Home page
$app->get('/', "GestionInfo\Controller\HomeController::indexAction")
->bind('home');

// Home page
$app->match('/printer', "GestionInfo\Controller\HomeController::printerAction")
->bind('printer');

$app->get('/login', "GestionInfo\Controller\HomeController::loginAction")
->bind('login');

$app->get('/admin', "GestionInfo\Controller\HomeController::adminAction")
->bind('admin');

// Home page
$app->match('/admin/printer/add', "GestionInfo\Controller\HomeController::addAction")
->bind('admin_printer_add');

// Home page
$app->match('/admin/printer/{id}/edit', "GestionInfo\Controller\HomeController::editAction")
->bind('admin_printer_edit');

// Home page
$app->get('/admin/printer/{{id}}/delete', "GestionInfo\Controller\HomeController::deleteAction")
->bind('admin_printer_delete');