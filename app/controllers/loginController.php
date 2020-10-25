<?php

    use app\core\Controller;

    class LoginController extends Controller {

        public function index() {

            $mensagem = [];

            if(isset($_POST["fazerLogin"])) {
                $auth = $this->model("auth");
                $mensagem = $auth->Login($_POST["email"], $_POST["senha"]);
            }

            $_SESSION = [];

            $this->view("login/index", $data = ["mensagem"=>$mensagem]);

        }

    }

?>