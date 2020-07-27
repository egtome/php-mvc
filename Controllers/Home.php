<?php

/**
 * Description of HomeController
 * Default controller. Do not rename it nor its methods.
 * @author gino
 */
class Home extends Controller {
    public function index(){
        $this->view->title = 'Default Controller';
        $this->view->render('home');
    }
}
