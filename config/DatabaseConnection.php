<?php

class DatabaseConnection {
    private static $connection;

    private function __construct() {} // Impede a criação de instâncias desta classe

    public static function getConnection() {
        if (self::$connection === null) {
            // Configurações do banco de dados
            $host = "localhost";
            $dbname = "desafio";
            $username = "root";
            $password = "root3306";

            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
