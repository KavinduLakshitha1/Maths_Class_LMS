<?php
class Database{
    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection= new mysqli("localhost","root","Mamunuwa@123","mathsclass");
        }
    }

    public static function search($query){
        Database::setUpConnection();
        $rs = Database::$connection->query($query);
        return $rs;
    }

    public static function iud($query){
        Database::setUpConnection();
        Database::$connection->query($query);
    }
}   


?>