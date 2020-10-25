<?php

    use app\core\Model;

    class saveModel extends Model {

        public function saveQuiz($data) {

            $pdo = Model::getConn();
            $sql = "INSERT INTO JOGO.QUESTOES VALUES (DEFAULT, ?, ?, ?, ?, UPPER(?))";

            $result = $pdo->prepare($sql);

            if($result->execute($data)) {
                return $this->toastAlert("Quiz Salvo Com Sucesso!", "green");
            }
            return $this->toastAlert("Erro ao Salvar Quiz!", "red");
            
        }

        public function savePlayer($nome, $email, $senha) {

            $pdo = Model::getConn();
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO JOGO.USUARIOS VALUES (DEFAULT, ?, ?, ?, DEFAULT, DEFAULT)";

            $result = $pdo->prepare($sql);

            if($result->execute([$nome, $email, $senha])) {
                return $this->toastAlert("Jogador Salvo Com Sucesso!", "green");
            }
            return $this->toastAlert("Erro ao Salvar Jogador!", "red");
            
        }

        public function updatePlayer($nome, $email, $senha, $id) {

            $pdo = Model::getConn();
            $sql = "UPDATE JOGO.USUARIOS SET NOME = ?, EMAIL = ?, SENHA = ? WHERE ID = ?";

            $result = $pdo->prepare($sql);

            if($result->execute([$nome, $email, $senha, $id])) {
                $_SESSION["NOME"] = $nome;
                $_SESSION["EMAIL"] = $email;
                $_SESSION["SENHA"] = $senha;
                return $this->toastAlert("Jogador Atualizado Com Sucesso!", "green");
            }
            return $this->toastAlert("Erro ao Atualizar Jogador!", "red");

        }

    }

?>