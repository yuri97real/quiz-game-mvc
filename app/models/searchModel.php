<?php

use app\core\Model;

class searchModel extends Model {

    public function searchQuiz($search) {

        $search = "%{$search}%";

        $pdo = Model::getConn();
        $sql = "SELECT * FROM JOGO.QUESTOES WHERE PERGUNTA LIKE ? OR OPCOES LIKE ?";
        $result = $pdo->prepare($sql);

        $result->execute([$search, $search]);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
        
    }

}