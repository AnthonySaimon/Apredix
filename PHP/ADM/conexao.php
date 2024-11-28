<?php

 class Conexao extends protocoloUser

{
    public static $instance;

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=aprendix",
                "root",
                "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4')
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
