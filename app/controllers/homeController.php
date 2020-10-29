<?php

    use app\core\Controller;

    class HomeController extends Controller {

        public function index() {

            $this->checkAuth();
            $this->view("home/index", []);

        }

        public function iniciar() {

            $this->checkAuth();
            $this->view("home/iniciar", []);

        }

        public function empty() {

            $this->checkAuth();
            $this->view("home/empty", []);

        }

        public function scores($action = []) {

            $this->checkAuth();

            $home = $this->model("home");

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