<?php
/**
 * Description of Bootstrap
 * Core logic here.
 * @author gino
 */

class Bootstrap {
    
    // Routing
    public function __construct() {
        if(!isset($_GET['target'])){
            //By default call HomeController->index()
            $controllerName = DEFAULT_CONTROLLER;
            $controller = new $controllerName();
            $controller->{DEFAULT_METHOD}();
        }else{
            $notFound = false;
            $parts = explode('/',trim($_GET['target']));
            //Check controllers & dispatch if match
            $controllerName = ucfirst(array_shift($parts));
            if(!file_exists(CONTROLLERS_PATH . $controllerName . '.php')){
                $notFound = true;
            }else{
                $controller = new $controllerName();
                //Check action
                if(empty($parts)){
                    //Default method -> index()
                    $controller->index();
                }else{
                    $actionName = array_shift($parts);
                    if(!method_exists($controller, $actionName)){
                        $notFound = true;
                    }else{
                        $params = !empty($parts) ? $parts : null;
                        $controller->{$actionName}($params);
                    }
                }                
            }  
            if($notFound){
                //404
                $controllerName = DEFAULT_NOT_FOUND_CONTROLLER;
                $controller = new $controllerName();
                $controller->{DEFAULT_NOT_FOUND_METHOD}();                
            }
        }
    }
}
