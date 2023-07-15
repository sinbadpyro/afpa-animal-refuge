<?php

class Database
{
    /**
     * Méthode qui retourne une instance de la classe PDO
     * @return object PDO
     */
    public static function getInstancePDO()
    {

        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8mb4';

        try {
            // création d'une instance de la classe PDO
            $pdo = new PDO($dsn, USER_DATABASE, PASSWORD_DATABASE);
            
                return $pdo;
            
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}