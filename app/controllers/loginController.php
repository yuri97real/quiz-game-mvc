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

        public function index()
        {
            $auth = $this->model("auth");

            if(isset($_POST["fazerLogin"])) {

                $user = $auth->getUserBy("email", $_POST["email"]);
                $password = $user["SENHA"] ?? "";

                if(password_verify($_POST["senha"], $password)) {
                    $_SESSION = $user;
                    $_SESSION["LOGADO"] = true;

                    $this->redirect("/home");
                }

                $this->message = $this->toastAlert("Usuário e/ou Senha Incorretos!", "red");

            } else {

                $total = $auth->countUsers();
                if($total == 0) $this->makeDefaultUser();

            }

            $this->view("login/index", $data = ["mensagem"=>$this->message]);

        }

        private function makeDefaultUser()
        {
            $file = $this->root("/database-config.sql");
            $sql = file_get_contents($file);

            ($this->model("default"))->execute($sql);

            $_SESSION = [
                "ID"=> 1,
                "NOME"=> "ADMIN",
                "EMAIL"=> "admin@gmail.com",
                "SENHA"=> '$2y$10$KeOP8Tzyr61wyDxDN4ABTucOe4TyQtYpHx.RuENgiksXs/R2EuWMy',
                "ADM"=> 1,
                "SCORE"=> 0,
                "LOGADO"=> true
            ];

            $this->redirect("/cadastro/atualizarJogador");
        }

    }

?>