<?php

    use app\core\Controller;

    class HomeController extends Controller {

        public function __construct() {
            $this->checkAuth();
        }

        public function index() {
            $this->view("home/index", []);
        }

        public function iniciar() {

            $home = $this->model("home");
            $questions = $home->getAllQuestions();

            if(!empty($questions)) {
                $this->view("home/iniciar", []);
            } else {
                $this->view("home/empty", []);
            }

        }

        public function empty() {
            $this->view("home/empty", []);
        }

        public function block() {
            $this->view("home/block", []);
        }

        public function scores($action = []) {

            $home = $this->model("home");

            if(!empty($action) && $action[0] == "zerar") {
                $home->updateScore(0, $_SESSION["ID"]);
            }

            if(isset($_POST["score"])) {
                $currentScore = $home->getScoreUser($_SESSION["ID"]);

                if($_POST["score"] > $currentScore) {
                    $home->updateScore($_POST["score"], $_SESSION["ID"]);
                }
            }

            $players = $home->getUsersInformation();

            $this->view("home/scores", $data = ["players"=>$players]);

        }

    }

?>