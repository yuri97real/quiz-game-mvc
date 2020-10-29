<?php

    use app\core\Controller;

    class ApiController extends Controller {

        public function questions($index = []) {
            
            $home = $this->model("home");
            $questions = $home->getAllQuestions();
            $index = $index[0] ?? "";

            $this->viewJSON($questions, $index);

        }

    }

?>