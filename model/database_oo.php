<?php
class Database {
    private static $dsn = 'mysql:host=webdev.bentley.edu;dbname=f17team4';
    private static $username = 'F17Team4';
    private static $password = 'F17Team4';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>