<?php

namespace GestionInfo\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;


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
      public function printerAction(Application $app) {
        $printers = $app['dao.printer']->findAll();
    
        return $app['twig']->render('printer.html.twig', ['printers'=>$printers]);
        }
    
    
}
