<?php
//Include env data
require 'env.php';

//Errors
if(defined('SHOW_ERRORS') && SHOW_ERRORS === true){
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
}

//Start session
session_start();


// Autoload all classes

spl_autoload_register(function($className){
    if(file_exists(CORE_PATH . $className . '.php')){
        require_once(CORE_PATH . $className . '.php');
    }
});

spl_autoload_register(function($className){
    if(file_exists(TRAITS_PATH . $className . '.php')){
        require_once(TRAITS_PATH . $className . '.php');
    }
});

spl_autoload_register(function($className){
    if(file_exists(CONTROLLERS_PATH . $className . '.php')){
        require_once(CONTROLLERS_PATH. $className . '.php');
    }
});
spl_autoload_register(function($className){
    if(file_exists(MODELS_PATH . $className . '.php')){
        require_once(MODELS_PATH . $className . '.php');
    }
});
spl_autoload_register(function($className){
    if(file_exists($className . '.php')){
        require_once($className . '.php');
    }
});

// Bootstrap
new Bootstrap();
