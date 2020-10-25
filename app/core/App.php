<?php

    namespace app\core;

    class App {

        protected $controller = "login", $method = "index", $params = [];

        public function __construct() {

            /*
                $route[1] SÃO CONTROLLERS
                $route[2] SÃO MÉTODOS
                $route[>2] O QUE SOBRA SÃO PARÂMETROS
            */

            $route = $this->parseURL();
            $fileController = $route[1] ?? $this->controller;
            $path = "../app/controllers/{$fileController}Controller.php";

            if(file_exists($path)) {
                $this->controller = $fileController;
                unset($route[1]);
            }

            require_once "../app/controllers/".$this->controller."Controller.php";

            $class = $this->controller."Controller";

            $this->controller = new $class;

            if(isset($route[2])) {
                if(method_exists($this->controller, $route[2])) {
                    $this->method = $route[2];
                    unset($route[0]);
                    unset($route[2]);
                }
            }

            $this->params = $route ? array_values($route) : [];

            call_user_func([$this->controller, $this->method], $this->params);

        }

        public function parseURL() {
            $url = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            $url = explode("/", $url);
            $url = array_filter($url);

            //print_r(array_values($url));

            return array_values($url);
        }

    }
?>