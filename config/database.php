<?php
 class Database{

     CONST DB_HOST="localhost";
     CONST DB_NAME="construction";
     CONST DB_USER="root";
     CONST DB_PASS="";

    public static $db;

     public static function connect()
     {
       
        try{

            $db=new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME,self::DB_USER,self::DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            
        }catch(PDOException $e){
            echo $e;
        }

        return $db;
     }

 }