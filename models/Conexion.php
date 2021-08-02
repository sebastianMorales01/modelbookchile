<?php
    namespace models;

class Conexion{
    
    //localhost
    /*
    public static $user="root";
    public static $pass="";
    public static $URL="mysql:host=localhost;dbname=modelbookchile";
    */

    //clever-cloud
    
    public static $user="uooj4sor8nv5keo2";
    public static $pass="AhtqDJdNq83zpXWD1JZi";
    public static $URL="mysql:host=bzbksf7xghaal7pgxowu-mysql.services.clever-cloud.com;dbname=bzbksf7xghaal7pgxowu";
    

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }   
}