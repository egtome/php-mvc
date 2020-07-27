<?php

/**
 * Description of NotFoundController
 * Default 404 handling
 * @author gino
 */
class NotFound extends Controller {
    public function index(){
        header("HTTP/1.0 404 Not Found");
    }
}
