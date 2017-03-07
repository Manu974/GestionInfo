<?php

// Home page
$app->get('/', "GestionInfo\Controller\HomeController::indexAction")
->bind('home');



$app->get('/login', "GestionInfo\Controller\HomeController::loginAction")
->bind('login');

$app->get('/admin', "GestionInfo\Controller\HomeController::adminAction")
->bind('admin');



// Home page
$app->match('/printer', "GestionInfo\Controller\HomeController::printerAction")
->bind('printer');

$app->match('/admin/printer/add', "GestionInfo\Controller\HomeController::addAction")
->bind('admin_printer_add');

// Home page
$app->match('/admin/printer/{id}/edit', "GestionInfo\Controller\HomeController::editAction")
->bind('admin_printer_edit');

// Home page
$app->get('/admin/printer/{{id}}/delete', "GestionInfo\Controller\HomeController::deleteAction")
->bind('admin_printer_delete');




$app->match('/admin/cartridge/add', "GestionInfo\Controller\CartridgeController::addAction")
->bind('admin_cartridge_add');

// Home page
$app->match('/admin/cartridge/{id}/edit', "GestionInfo\Controller\CartridgeController::editAction")
->bind('admin_cartridge_edit');

// Home page
$app->get('/admin/cartridge/{{id}}/delete', "GestionInfo\Controller\CartridgeController::deleteAction")
->bind('admin_cartridge_delete');