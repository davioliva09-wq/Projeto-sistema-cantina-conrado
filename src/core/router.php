<?php
require_once __DIR__ . '/../routes/HomeController.php';
require_once __DIR__ . '/../routes/CatalogoController.php';


class Router{

    public function dispatch($url){
        
        $url = trim($url, "/");
        $parts = $url ? explode("/", $url) : [];
        $controllerName = $parts[0] ?? 'Home';

        $controllerName = ucfirst($controllerName) . "Controller";
        $controller = new $controllerName();

        //var_dump($controller);

        $controller->inicial();

    }
}
