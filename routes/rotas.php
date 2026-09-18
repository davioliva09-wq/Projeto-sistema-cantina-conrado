<?php
function load(string $controller, string $action){
    
}
$routes = [
    'GET' => [
        '/' => load('homeController', 'index'),
        '/contact' => load('ContactController', 'index')
    ],
    'POST' => [
        '/contact' => load('ContactController', 'index')
    ]
];
