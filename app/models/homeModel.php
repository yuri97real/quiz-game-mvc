<?php

    use app\core\Model;

    class homeModel extends Model {

        public function getUsersInformation() {

            $pdo = Model::getConn();
            $sql = "SELECT NOME, EMAIL, SCORE FROM JOGO.USUARIOS ORDER BY SCORE DESC";

            $result = $pdo->prepare($sql);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getQuestion($id) {

            $pdo = Model::getConn();
            $sql = "SELECT * FROM JOGO.QUESTOES WHERE ID = ?";

            $result = $pdo->prepare($sql);
            $result->execute([$id]);

            return $result->fetch(\PDO::FETCH_ASSOC);

        }

        public function getAllQuestions($limit = 50, $offset = 0) {

            $pdo = Model::getConn();
            $sql = "SELECT * FROM JOGO.QUESTOES LIMIT {$limit} OFFSET {$offset}";

            $result = $pdo->prepare($sql);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);

        }

        public function getScoreUser($ID) {

            $pdo = Model::getConn();
            $sql = "SELECT SCORE FROM JOGO.USUARIOS WHERE ID = $ID";

            $result = $pdo->prepare($sql);
            $result->execute();
            $result = $result->fetch(\PDO::FETCH_ASSOC);

            return $result["SCORE"];

        }

        public function updateScore($score, $id) {

            $pdo = Model::getConn();
            $sql = "UPDATE JOGO.USUARIOS SET SCORE = $score WHERE ID = $id";

            $result = $pdo->prepare($sql);
            $result->execute();

        }

    }

?>