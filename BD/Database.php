<?php

class Database {
    private static ?PDO $instance = null;
    
    public static function getInstance(){
        $config = require __DIR__ . "/config.php";
        $db = $config["db"];

        if (!self::$instance){
            self::$instance = new PDO("mysql:host={$db['host']};dbname={$db['dbname']}", $db['user'], $db['pass']);
        }

        return self::$instance;
    }
}