<?php 

require_once(__DIR__ . '/../config/init.php');

// connexion de la base des données  
// $dsn : data source name 
// host: hébergeur 

class Database {
    // méthode connect statique : sans new databse 
    public static function connect () {
        $pdo = new PDO(DSN, USER, PASSWORD);
        return $pdo;
    }
    
}

