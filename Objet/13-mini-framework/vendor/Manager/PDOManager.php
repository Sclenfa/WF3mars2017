<?php

    namespace Manager;

    use PDO;  // On recupere la classe PDO appartenant à l'espace global de PHP. sans cela nous devrions appeler PDO comme cela : \PDO pour sortir de l'espace Manager.

    class PDOManager{
        private static $instance = NULL;
        protected $pdo;  //Contiendra notre objet PDO (connexion a la BDD)
        private function __construct(){}
        private function __clone(){}

        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance = new self;
            }
            return self::$instance;
        }
        public function getPDO(){
            include_once(__DIR__ . '/../../app/Config.php');
            $config = new \Config;;
            $connect = $config -> getParametersConnect();

            try{
                $this -> pdo = new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'], array(PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            }
            catch(PDOException $e){
                echo '<p style="background: red; color: white; padding: 20px;">';
                echo 'Vous avez une erreur de connexion a la BDD : <br>';
                echo '<b><u>Message</u></b> :' . $e -> getMessage();
                echo '<b><u>Fichier</u></b> :' . $e -> getFile();
                echo '<b><u>Line</u></b> :' . $e -> getLine();
                echo '</p>';
                exit;
            }
            return $this -> pdo;
        }
    }