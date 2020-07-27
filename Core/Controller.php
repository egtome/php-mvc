<?php
/**
 * Description of Controller
 * Controller core
 * @author gino
 */
if(defined('SITE_LOADED') === false){
    exit('DENIED');
    //header('HTTP/1.0 403 Forbidden');
    die();
}

class Controller {
    protected $view = null;
    public function __construct() {
        $this->view = new View();
    }
}
