<?php

    namespace app\core;

    abstract class Controller {

        public function model($model) {
            $model .= "Model";
            require_once "../app/models/$model.php";
            return new $model;
        }

        public function view($view, $data = []) {
            require_once "../app/views/template.php";
        }

    }

?>