<?php
class Database {
    public static function connect() {
        try {
            return new PDO("mysql:host=localhost;dbname=sistemarol", "root", "");
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
