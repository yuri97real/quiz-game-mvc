<?php

    namespace app\core;

    class App {

        public function __construct() {

            $route = $this->parseURL();

            $controller = $this->getController($route);
            $method = $this->getMethod($controller, $route);
            $params = $this->getParams($route);

            call_user_func([$controller, $method], $params);

            /*
                $route[1] SÃO CONTROLLERS
                $route[2] SÃO MÉTODOS
                $route[>2] O QUE SOBRA SÃO PARÂMETROS
            */
            
        }

        public function getController($route) {

            $controller = $route[0] ?? "login";
            $controller .= "Controller";

            if(!file_exists("../app/controllers/{$controller}.php")) {
                $controller = "ErrorController";
            }

            require_once "../app/controllers/{$controller}.php";

            return new $controller;
        }

        public function getMethod($class, $route) {

            $method = $route[1] ?? "index";

            if(!method_exists($class, $method)) {
                $method = "index";
            }

            return $method;
        }

        public function getParams($route) {

            unset($route[0], $route[1]);

            return $route ? array_values($route) : [];
        }

        public function parseURL() {
            $url = $_SERVER["REQUEST_URI"];
            $url = explode("/", $url);
            $url = array_filter($url);

            return array_values($url);
        }

    }
?>