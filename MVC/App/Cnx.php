<?php

    namespace App;

use PDO;


class Cnx {

    /**
     * 
     * L'instance de PDO que retourne le singleton
     * 
     * @var PDO
     */
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB_NAME = 'mvc';
    
    private static $instance = NULL;
        private function __construct(){}
        
        /**
         * @return PDO
         */
        
        private function __clone(){}

        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new PDO(
                        'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                        self::USER,
                        self::PASSWORD,
                        [
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        ]
                );
            }
            return self::$instance;
       }
}
