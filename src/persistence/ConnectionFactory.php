<?php

 namespace App\persistence;

use App\SystemServices\MonologFactory;

class ConnectionFactory{

   static $dbuser='ubn_moodle';
   static $dbhost='172.17.0.2';
   static $dbname='mysql';

   static $password="thiago123";

   static $pdo;

   static function getConnectionInstance(){
       
        try{
      
            self::$pdo = new \PDO("mysql:host=".self::$dbhost.":dbname=".self::$dbname, self::$dbuser, self::$password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            MonologFactory::getInstance()->info("Conexao obtida com sucesso!");
   
        }catch(\PDOException $ex){
        
        MonologFactory::getInstance()->info("falha ao obter conexao");
        MonologFactory::getInstance()->info($ex->getMessage());
   
    }
    return self::$pdo;
  }


 }
 ?>