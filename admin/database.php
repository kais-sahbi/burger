<?php

class Database //private static : se sont des parametres static qui appartient à la classe lui meme non p à l'instance de la classe
{
    private static $dbHost = "localhost";
    private static $dbName = "burgercode_fini";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)//self : pour acceder à une propriéte static privé
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }
      
}
 //Database::connect();// connexion à db (sans self parceque la fct connect est public)



?>
