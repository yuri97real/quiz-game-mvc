<?php

    namespace app\core;

    abstract class Model {

        private static $pdo;
        
        public static function getConn() {
            if(!isset(self::$pdo)) {
                self::$pdo = new \PDO("mysql:host=localhost", "root", "");
            }
            return self::$pdo;
        }

    }

?>