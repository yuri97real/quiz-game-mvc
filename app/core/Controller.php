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

        public function viewJSON($data = [], $index = []) {
            require_once "../app/views/json.php";
        }

        public function checkAuth() {
            $auth = $this->model("auth");
            $auth->checkLogin();
        }

        public function toastAlert($message, $color) {
            return "<script>M.toast({html: '$message', classes: 'rounded, $color'})</script>";
        }

    }

?>