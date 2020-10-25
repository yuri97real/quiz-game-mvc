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
            $currentIndex = rand(0, $numberOfQuestions - 1);
            $currentQuestion = $questions[$currentIndex];
            //echo $currentIndex;

            if(isset($_POST["resposta"])) {
                if(password_verify($_POST["resposta"], $_POST["certa"])) {
                    $message = "<script>M.toast({html: 'Acertou', classes: 'rounded, green'});</script>";
                } else $message = "<script>M.toast({html: 'Errou', classes: 'rounded, red'});</script>";
            }

            $this->view("home/iniciar", $data = ["question"=>$currentQuestion, "mensagem"=>$message]);

        }

        public function scores() {

            $auth = $this->model("auth");
            $auth->checkLogin();

            $home = $this->model("home");
            $players = $home->getUsersInformation();

            $this->view("home/scores", $data = ["players"=>$players]);

        }

    }

?>