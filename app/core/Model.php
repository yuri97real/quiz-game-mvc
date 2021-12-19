<?php

    namespace app\core;

    abstract class Model {

        private static $pdo;
        
        public static function getConn() {
            if(!isset(self::$pdo)) {
                self::$pdo = new \PDO("mysql:host=".DB_HOST, DB_USER, DB_PASSWORD);
            }
            return self::$pdo;
        }

    }

?>