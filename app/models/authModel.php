<?php

    use app\core\Model;

    class authModel extends Model {

        public function getUserBy($key, $value)
        {
            $pdo = Model::getConn();
            $key = mb_strtoupper($key);

            $sql = "SELECT * FROM JOGO.USUARIOS WHERE {$key} = ?";

            $result = $pdo->prepare($sql);
            $result->execute([$value]);

            return $result->fetch(\PDO::FETCH_ASSOC);
        }

        public function countUsers()
        {
            $pdo = Model::getConn();

            $sql = "SELECT COUNT(ID) AS TOTAL FROM JOGO.USUARIOS";

            $result = $pdo->prepare($sql);
            $result->execute();

            $total = $result->fetch(\PDO::FETCH_ASSOC);

            return $total["TOTAL"] ?? 0;
        }

    }

?>