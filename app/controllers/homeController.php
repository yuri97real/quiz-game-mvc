<?php

    use app\core\Controller;

    class HomeController extends Controller {

        public function index() {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $this->view("home/index", []);

        }

        public function iniciar() {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $home = $this->model("home");
            $questions = $home->getAllQuestions();
            $message = [];

            $numberOfQuestions = count($questions);

            if($numberOfQuestions != 0) {
                $currentIndex = rand(0, $numberOfQuestions - 1);
                $currentQuestion = $questions[$currentIndex];

                if(isset($_POST["resposta"])) {
                    if(password_verify($_POST["resposta"], $_POST["certa"])) {
                        $message = "<script>M.toast({html: 'Acertou', classes: 'rounded, green'});</script>";
                    } else $message = "<script>M.toast({html: 'Errou', classes: 'rounded, red'});</script>";
                }

                $this->view("home/iniciar", $data = ["question"=>$currentQuestion, "mensagem"=>$message]);
                die();
            }

            $this->view("home/empty", []);

        }

        public function scores($action = []) {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $home = $this->model("home");
            $players = $home->getUsersInformation();

            $action = $action[0] ?? "";

            $this->view("home/scores", $data = ["action"=>$action, "players"=>$players]);

        }

    }

?>