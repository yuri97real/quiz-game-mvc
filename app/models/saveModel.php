<?php

    use app\core\Model;

    class saveModel extends Model {

        public function saveQuiz($data) {

            $pdo = Model::getConn();
            $sql = "INSERT INTO JOGO.QUESTOES VALUES (DEFAULT, ?, ?, ?, ?, UPPER(?))";

            $result = $pdo->prepare($sql);

            if($result->execute($data)) {
                return true;
            }
            return false;
            
        }

        public function savePlayer($nome, $email, $senha) {

            $pdo = Model::getConn();
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO JOGO.USUARIOS VALUES (DEFAULT, ?, ?, ?, DEFAULT, DEFAULT)";

            $result = $pdo->prepare($sql);

            if($result->execute([$nome, $email, $senha])) {
                return true;
            }
            return false;
            
        }

        public function updatePlayer($nome, $email, $senha, $id) {

            $pdo = Model::getConn();
            $sql = "UPDATE JOGO.USUARIOS SET NOME = ?, EMAIL = ?, SENHA = ? WHERE ID = ?";

            $result = $pdo->prepare($sql);

            if($result->execute([$nome, $email, $senha, $id])) {
                $_SESSION["NOME"] = $nome;
                $_SESSION["EMAIL"] = $email;
                $_SESSION["SENHA"] = $senha;
                
                return true;
            }
            return false;

        }

        public function updateQuiz($data, $id) {

            $pdo = Model::getConn();
            $sql = "UPDATE JOGO.QUESTOES SET PERGUNTA = ?, OPCOES = ?, CERTA = ?, NIVEL = ?, CATEGORIA = ? WHERE ID = ?";

            $result = $pdo->prepare($sql);

            array_push($data, $id);

            if($result->execute($data)) {
                return true;
            }
            return false;

        }

        public function deleteQuiz($id) {

            $pdo = Model::getConn();
            $sql = "DELETE FROM JOGO.QUESTOES WHERE ID = ?";
            $result = $pdo->prepare($sql);
            $result->execute([$id]);
            $count = $result->rowCount();

            if($count > 0) {
                return true;
            }
            return false;

        }

        public function restoreQuiz($data) {

            $pdo = Model::getConn();
            $sql = "INSERT INTO JOGO.QUESTOES VALUES (?, ?, ?, ?, ?, ?)";

            $result = $pdo->prepare($sql);

            if($result->execute($data)) {
                return true;
            }
            return false;

        }

    }

?>