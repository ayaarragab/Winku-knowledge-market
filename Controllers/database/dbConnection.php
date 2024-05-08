<?php
class DBConnection{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $database = 'winku';
    private static $port_number = 3306;
    private static $conn;
    private function __construct() {
    }
    public static function getConnection() {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli(self::$host, self::$user, self::$password, self::$database, self::$port_number);
        }
        return self::$conn;
    }
}