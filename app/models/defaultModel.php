<?php

    use app\core\Model;

    class defaultModel extends Model {

        public function execute($query, $alerts = false) {

            $pdo = Model::getConn();
            $result = $pdo->prepare($query);

            $result->execute();
            
        }

    }

?>