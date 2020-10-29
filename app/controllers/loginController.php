<?php

    use app\core\Controller;

    class LoginController extends Controller {

        public function index() {

            $message = [];

            if(isset($_POST["fazerLogin"])) {
                $auth = $this->model("auth");
                $auth->Login($_POST["email"], $_POST["senha"]);

                $message = $this->toastAlert("Usuário e/ou Senha Incorretos!", "red");
            }

            $_SESSION = [];

            $this->view("login/index", $data = ["mensagem"=>$message]);

        }

    }

?>