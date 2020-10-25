<?php

    namespace app\core;

    abstract class Model {

        private static $pdo;
        
        public static function getConn() {
            if(!isset(self::$pdo)) {
                self::$pdo = new \PDO("mysql:host=localhost", "yuri97", "19971028");
            }
            return self::$pdo;
        }

        public function toastAlert($message, $color) {
            return "<script>M.toast({html: '$message', classes: 'rounded, $color'});</script>";
        }

    }

?>