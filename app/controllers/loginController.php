<?php

    use app\core\Controller;

    class LoginController extends Controller {

        private $message = [];

        public function __construct()
        {
            if(!empty($_SESSION)) {
                $this->message = $this->toastAlert("Você Está Deslogado!", "orange");
            }

            $_SESSION = [];
        }

        public function index() {

            $message = [];

            if(isset($_POST["fazerLogin"])) {
                $auth = $this->model("auth");
                $auth->Login($_POST["email"], $_POST["senha"]);

                $this->message = $this->toastAlert("Usuário e/ou Senha Incorretos!", "red");
            }

            $this->view("login/index", $data = ["mensagem"=>$this->message]);

        }

    }

?>