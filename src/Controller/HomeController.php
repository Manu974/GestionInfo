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
    
    
}
