<?php 



class Controller{
    protected function view($view){
        $viewFile = __DIR__ . '/../views/'.$view .'.php'; 
    }
}