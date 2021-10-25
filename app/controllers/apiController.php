<?php

    use app\core\Controller;

    class ApiController extends Controller {

        public function __construct() {

            $this->checkAuth();

        }

        public function index() {
            
            $array = ["message"=>"Welcome to Quiz Game", "author"=>"Yuri Seabra Maciel"];

            $this->json($array);
        }

        public function questions($index = []) {
            
            $home = $this->model("home");
            $questions = $home->getAllQuestions();
            $index = $index[0] ?? "";

            $this->json($questions, $index);

        }

        public function search($params = []) {

            $index = $params[0] ?? 1;
            $index = is_numeric($index) && $index > 0 ? $index : 1;

            $limit = 50;
            $offset = is_numeric($index) ? $limit * ($index - 1) : 0;

            $keyword = $_GET["keyword"] ?? "";
            
            if($keyword == "") $this->json();

            $search = $this->model("search");
            $questions = $search->searchQuiz($keyword, $limit, $offset);

            $this->json($questions);

        }

    }

?>