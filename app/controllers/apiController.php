<?php

    use app\core\Controller;

    class ApiController extends Controller {

        public function __construct() {

            $this->checkAuth();

        }

        public function index() {
            
            $array = ["message"=>"Welcome to Quiz Game", "author"=>"Yuri Seabra Maciel"];

            $this->viewJSON($array);
        }

        public function questions($index = []) {
            
            $home = $this->model("home");
            $questions = $home->getAllQuestions();
            $index = $index[0] ?? "";

            $this->viewJSON($questions, $index);

        }

        public function search($index = []) {

            if(!empty($index)) {

                $search = $this->model("search");

                $keyword = explode("-", $index[0]);
                $keyword = implode(" ", $keyword);

                $questions = $search->searchQuiz($keyword);

                $this->viewJSON($questions);

            }

        }

    }

?>