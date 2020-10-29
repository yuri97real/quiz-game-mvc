<?php

    use app\core\Controller;

    class cadastroController extends Controller {

        public function index() {

            $this->view("cadastro/index", []);

        }

        public function novoQuiz() {

            $this->checkAuth();

            $quiz = $this->model("save");
            $message = [];

            if(isset($_POST["cadastrarQuiz"])) {
                $save = $quiz->saveQuiz($_POST["dados"]);
                $color = $save ? "green" : "red";
                $message = $save ? "Quiz Cadastrado Com Sucesso" : "Falha ao Cadastrar Quiz";
                $message = $this->toastAlert($message, $color);
            }

            $this->view("cadastro/quiz", $data = ["mensagem"=>$message]);

        }

        public function novoJogador() {

            $quiz = $this->model("save");
            $message = [];

            if(isset($_POST["cadastrarJogador"])) {
                $save = $quiz->savePlayer($_POST["nome"], $_POST["email"], $_POST["senha"]);
                $color = $save ? "green" : "red";
                $message = $save ? "Jogador Cadastrado Com Sucesso" : "Falha ao Cadastrar Jogador";
                $message = $this->toastAlert($message, $color);
            }
            
            $this->view("cadastro/jogador", $data = ["mensagem"=>$message]);

        }

        public function atualizarJogador() {

            $this->checkAuth();

            $message = [];

            if(isset($_POST["atualizarJogador"])) {
                $quiz = $this->model("save");
                $senha = $_POST["senha"] == "" ? $_SESSION["SENHA"] : password_hash($_POST["senha"], PASSWORD_DEFAULT);
                $update = $quiz->updatePlayer($_POST["nome"], $_POST["email"], $senha, $_SESSION["ID"]);
                $color = $update ? "green" : "red";
                $message = $update ? "Jogador Atualizado Com Sucesso" : "Falha ao Atualizar Jogador";
                $message = $this->toastAlert($message, $color);
            }

            $this->view("atualizar/jogador", $data = ["mensagem"=>$message]);

        }

    }

?>