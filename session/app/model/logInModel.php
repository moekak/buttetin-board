<?php 

class logInModel {
    public $pdo;
    public $userData;
    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    public function checkUser($username, $email){
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE username = :username AND email = :email");
        $statement->bindValue(':username', $username);
        $statement->bindValue(":email", $email);
        $statement->execute();

        $this->userData = $statement->fetch(PDO::FETCH_ASSOC);
    }
}