<?php 
    class Database {
    
    // private static $dsn = 'mysql:host=localhost;dbname=morehouse_db';
    // private static $username = 'morehouse';
    // private static $password = 'password';
    // private static $db;
    
    
    private static $dsn = 'mysql:host=sql208.epizy.com;dbname=epiz_27139925_morehouse_db';
    private static $username = 'epiz_27139925';
    private static $password = 'TXdgeqXmbw';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO (self::$dsn, self::$username, self::$password);
            } catch (PDOException $e){
                $error = $e->getMessage();
                include('../errors/error.php');
                exit();
            }
        }
        return self::$db;
    }

    public static function display_db_error($error_message) {
        $error = $error_message;
        include('../errors/error.php');
        exit();
    }
    }
?>