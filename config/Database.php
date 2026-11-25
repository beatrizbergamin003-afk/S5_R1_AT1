<?php 
class Database {
    private static $conn;

    public static function conectar() {
        if (!self::$conn) {
            self::$conn = new PDO(
                "pgsql:host=localhost;port=5432;dbname=sistema_livros",
                "crudlivro",
                "1234",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
            
        }
        return self::$conn;
    }
}


?>