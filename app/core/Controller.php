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

        public function json($data = []) {
            echo json_encode($data); die;
        }

        public function checkAuth() {
            if(isset($_SESSION["LOGADO"])) return true;
            $this->redirect("/");
        }

        public function checkAdmin() {
            if($_SESSION["ADM"] == 1) return true;
            $this->redirect("/home/block");
        }

        public function toastAlert($message, $color) {
            return "<script>M.toast({html: '$message', classes: 'rounded, $color'})</script>";
        }

        public function redirect($route = "/home")
        {
            header("Location: {$route}"); die;
        }

        public function root($path = "")
        {
            $absDir = str_replace("\\", "/", __DIR__);
            $absDir = str_replace([
                "/app", "/core", "/public"
            ], "", $absDir);
            
            return $absDir . $path;
        }

    }

?>