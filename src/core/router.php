<?php 
class Router{
    public function dispatch($url){
        $url = trim($url, '/');

        $parts = $url ? explode("/", $url) : [];
        echo $url;

        echo '<br>';
        var_dump($parts);


        $controllerName = $parts[0] ?? "HomeController";
        echo '<hr>';
        echo "controller " .($controllerName);










        $controllerName2 = $parts[1] ?? "Homecontrucker";
        echo "<hr>";
        echo($controllerName2) . " controller"; 
    }
}