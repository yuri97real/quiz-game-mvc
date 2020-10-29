<?php

    use app\core\Model;

    class authModel extends Model {

        public function Login($email, $senha) {

            $pdo = Model::getConn();

            $sql = "SELECT * FROM JOGO.USUARIOS WHERE EMAIL = ?";
            $result = $pdo->prepare($sql);
            $result->execute([$email]);

            if($result->rowCount() > 0) {

                $data = $result->fetch(\PDO::FETCH_ASSOC);

                if(password_verify($senha, $data["SENHA"])) {
                    $_SESSION = $data;
                    $_SESSION["LOGADO"] = TRUE;

                    header("Location: /home");
                    die();
                }
            }
        }

        public function checkLogin() {
            if(!isset($_SESSION["LOGADO"])) {
                header("Location: /");
                die;
            }
        }

    }

?>