<?php

/**
 * Description of View
 * View CORE
 * @author gino
 */
class View {
    public $title = 'Default title';
    public $error;
    public $message;
    public function render($path,$layout = null){
        if($layout === null){
            $this->view = $path;
            require(VIEWS_PATH . 'layout.php');
        }elseif($layout === false){
            require(VIEWS_PATH . $path . '.php');
        }else{
            $this->view = $path;
            require(VIEWS_PATH . $layout . '.php');            
        }
    }
}
