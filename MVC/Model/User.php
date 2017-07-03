<?php

namespace Model;

use App\Cnx;

class User{
    
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $adress;
    /**
     * @var string
     */
    private $email;
    
    public function __construct(
            $lastname = NULL,
            $firstname = NULL,
            $adress = NULL,
            $email = NULL,
            $id = NULL
)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->adress = $adress;
        $this->email = $email;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getAdress() {
        return $this->adress;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setAdress($adress) {
        $this->adress = $adress;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    /**
     * Méthode qui retourne tous les utilisateurs enregistrés en BDD
     * @return array Un tableau d'objet User
     */
    
    public static function findAll(){
        $pdo = Cnx::getInstance();
        $query = 'SELECT * FROM user ORDER BY id';
        $stmt = $pdo->query($query);
        $dbUsers = $stmt -> fetchAll();
        $users = [];
        
        foreach($dbUsers as $dbUser){
            $user = new self(
                    $dbUser['firstname'],
                    $dbUser['lastname'],
                    $dbUser['email'],
                    $dbUser['adress'],
                    $dbUser['id']
            );
            
            $users[] = $user;
        }
        
        return $users;
    }
}
