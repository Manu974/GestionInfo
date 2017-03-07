<?php

namespace GestionInfo\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use GestionInfo\Domain\Cartridge;
use GestionInfo\Form\Type\PrinterType;


class CartridgeController {

    

    public function addAction(Request $request, Application $app) {

        $cartridge = new Cartridge();
    $cartridgeForm = $app['form.factory']->create(CartridgeType::class, $cartridge);
    $pcartridgeForm->handleRequest($request);
    if ($cartridgeForm->isSubmitted() && $cartridgeForm->isValid()) {
        $app['dao.cartridge']->save($cartridge);
        $app['session']->getFlashBag()->add('success', 'The cartridge was successfully created.');
    }
    return $app['twig']->render('cartridge_form.html.twig', array(
        'title' => 'New cartridge',
        'cartridgeForm' => $cartridgeForm->createView()));
    }

    public function editAction (Request $request, Application $app,$id) {
        $cartridge = $app['dao.cartridge']->find($id);
        

    $cartridgeForm = $app['form.factory']->create(CartridgeType::class, $cartridge);
        
    $cartridgeForm->handleRequest($request);
    
    if ($cartridgeForm->isSubmitted() && $cartridgeForm->isValid()) {
        $app['dao.cartridge']->save($cartridge);
        $app['session']->getFlashBag()->add('success', 'The cartridge was successfully updated.');
    }
    return $app['twig']->render('cartridge_form.html.twig', array(
        'title' => 'Edit cartridge',
        'cartridgeForm' => $cartridgeForm->createView()));
    }

    public function deleteAction(Request $request, Application $app,$id) {
        
    $app['dao.cartridge']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The cartridge was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
    }
    
    
}
