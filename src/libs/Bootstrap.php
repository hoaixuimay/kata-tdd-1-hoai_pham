<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode("/", $url);
        
        //print_r($url);

        if(empty($url[0])){
            require "controllers/IndexController.php";
            $controller = new IndexController();
            return false;
        }
        
        $controllerName = ucfirst($url[0]) . "Controller";
        $file = "controllers/" . $controllerName . ".php";
        if(file_exists($file)){
            require $file;
        } else {
            require "controllers/ErrorController.php";
            $controller = new ErrorController();
            return false;
        }
        
        $controller = new $controllerName;

        if (isset($url[1])) {
            $action = 'action' . $url[1];
            $controller->{$action}();
        }
    }

}
