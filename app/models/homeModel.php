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

        public function getAllQuestions() {

            $pdo = Model::getConn();
            $sql = "SELECT * FROM JOGO.QUESTOES";

            $result = $pdo->prepare($sql);
            $result->execute();

            return $result->fetchAll(\PDO::FETCH_ASSOC);

        }

    }

?>