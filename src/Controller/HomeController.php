<?php

namespace GestionInfo\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use GestionInfo\Domain\Printer;
use GestionInfo\Form\Type\PrinterType;


class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        
        return $app['twig']->render('index.html.twig');
        }

     /**
     * printer details controller.
     *
     * 
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
      public function printerAction(Request $request, Application $app) {
        $printers = $app['dao.printer']->findAll();
        $cartridges = $app['dao.cartridge']->findAll();
        $printerFormView = null ;

        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            // A user is fully authenticated : he can add comments
            $printer = new Printer();
            $user = $app['user'];
            $printerForm = $app['form.factory']->create(PrinterType::class, $printer);
            $printerForm->handleRequest($request);
            if ($printerForm->isSubmitted() && $printerForm->isValid()) {
                $app['dao.printer']->save($printer);
                $app['session']->getFlashBag()->add('success', 'Your printer was successfully added.');
            }
            $printerFormView = $printerForm->createView();
        }

        return $app['twig']->render('printer.html.twig', ['printers'=>$printers,'cartridges'=>$cartridges, 'printerForm' => $printerFormView]);
        }

           /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }


    public function adminAction (Application $app) {

        $printers = $app['dao.printer']->findAll();
        $users = $app['dao.user']->findAll();
         return $app['twig']->render('admin.html.twig', array(
        'printers' => $printers,
        'users' => $users));
    }

    public function addAction(Request $request, Application $app) {

        $printer = new Printer();
    $printerForm = $app['form.factory']->create(PrinterType::class, $printer);
    $printerForm->handleRequest($request);
    if ($printerForm->isSubmitted() && $printerForm->isValid()) {
        $app['dao.printer']->save($printer);
        $app['session']->getFlashBag()->add('success', 'The printer was successfully created.');
    }
    return $app['twig']->render('printer_form.html.twig', array(
        'title' => 'New printer',
        'printerForm' => $printerForm->createView()));
    }

    public function editAction (Request $request, Application $app,$id) {
        $printer = $app['dao.printer']->find($id);
        

    $printerForm = $app['form.factory']->create(PrinterType::class, $printer);
        
    $printerForm->handleRequest($request);
    
    if ($printerForm->isSubmitted() && $printerForm->isValid()) {
        $app['dao.printer']->save($printer);
        $app['session']->getFlashBag()->add('success', 'The printer was successfully updated.');
    }
    return $app['twig']->render('printer_form.html.twig', array(
        'title' => 'Edit printer',
        'printerForm' => $printerForm->createView()));
    }

    public function deleteAction(Request $request, Application $app,$id) {
        
    $app['dao.printer']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The printer was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
    }
    
    
}
