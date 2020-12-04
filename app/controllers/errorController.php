<?php

use app\core\Controller;

class ErrorController extends Controller {

    public function index() {
        $this->view("error/index", ["title"=>"Ooops!"]);
    }

}