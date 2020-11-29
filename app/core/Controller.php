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
            if(!isset($_SESSION["LOGADO"])) {
                header("Location: /");
                die;
            }
        }

        public function checkAdmin() {
            if($_SESSION["ADM"] != 1) {
                header("Location: /home/block");
                die;   
            }
        }

        public function toastAlert($message, $color) {
            return "<script>M.toast({html: '$message', classes: 'rounded, $color'})</script>";
        }

    }

?>