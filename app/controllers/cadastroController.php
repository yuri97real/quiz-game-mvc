<?php

    use app\core\Controller;

    class cadastroController extends Controller {

        public function index() {

            $this->view("cadastro/index", []);

        }

        public function novoQuiz() {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $quiz = $this->model("save");
            $mensagem = [];

            if(isset($_POST["cadastrarQuiz"])) {
                $mensagem = $quiz->saveQuiz($_POST["dados"]);
            }

            $this->view("cadastro/quiz", $data = ["mensagem"=>$mensagem]);

        }

        public function novoJogador() {

            $quiz = $this->model("save");
            $mensagem = [];

            if(isset($_POST["cadastrarJogador"])) {
                $mensagem = $quiz->savePlayer($_POST["nome"], $_POST["email"], $_POST["senha"]);
            }
            
            $this->view("cadastro/jogador", $data = ["mensagem"=>$mensagem]);

        }

        public function atualizarJogador() {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $mensagem = [];

            if(isset($_POST["atualizarJogador"])) {
                $quiz = $this->model("save");
                $senha = $_POST["senha"] == "" ? $_SESSION["SENHA"] : password_hash($_POST["senha"], PASSWORD_DEFAULT);
                $mensagem = $quiz->updatePlayer($_POST["nome"], $_POST["email"], $senha, $_SESSION["ID"]);
            }

            $this->view("atualizar/jogador", $data = ["mensagem"=>$mensagem]);

        }

    }

?>