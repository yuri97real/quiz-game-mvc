<?php

    use app\core\Controller;

    class cadastroController extends Controller {

        public function index() {

            $this->view("cadastro/index", []);

        }

        public function novoQuiz() {

            $this->checkAdmin();

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

        public function atualizarQuiz() {

            $this->checkAdmin();

            $message = [];

            $home = $this->model("home");
            $questions = $home->getAllQuestions();

            $this->view("atualizar/quiz", $data = ["questions"=>$questions, "mensagem"=>$message]);

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

        public function editarQuestao($index = []) {

            $this->checkAdmin();
            $message = [];

            if(isset($_POST["atualizarQuiz"])) {
                $save = $this->model("save");
                $update = $save->updateQuiz($_POST["dados"], $index[0]);
                $color = $update ? "green" : "red";
                $message = $update ? "Quiz Atualizado Com Sucesso" : "Falha ao Atualizar Quiz";
                $message = $this->toastAlert($message, $color);
            }

            $quiz = $this->model("home");
            $question = $quiz->getQuestion($index[0]);

            $this->view("atualizar/editarQuestao", $data = ["question"=>$question, "message"=>$message]);

        }

        public function excluirQuiz($index = []) {

            $this->chechAdmin();

            $quiz = $this->model("home");
            $question = $quiz->getQuestion($index[0]);

            $modify = $this->model("save");
            $delete = $modify->deleteQuiz($index[0]);

            $color = $delete ? "green" : "red";
            $message = $delete ? "Quiz Atualizado Com Sucesso" : "Falha ao Atualizar Quiz";
            $message = $this->toastAlert($message, $color);

            $this->view("excluir/resultado", $data = ["sucess"=>$delete, "question"=>$question, "message"=>$message]);

        }

        public function restaurarQuiz() {

            $message = [];

            if(isset($_POST["recovery"])) {

                $modify = $this->model("save");
                $restore = $modify->restoreQuiz(explode(" | ", $_POST["recovery"]));

                $color = $restore ? "green" : "red";
                $message = $restore ? "Quiz Restaurado Com Sucesso" : "Falha ao Restaurar Quiz";
                $message = $this->toastAlert($message, $color);

            }

            $this->view("excluir/desfazer", $data = ["sucess"=>$restore, "message"=>$message]);

        }

    }

?>