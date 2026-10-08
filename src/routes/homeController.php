<?php

require_once __DIR__ . '/../core/controller.php';

class HomeController extends Controller {
    public function inicial() {
        require_once __DIR__ . '/../views/index.php';
    }
}
