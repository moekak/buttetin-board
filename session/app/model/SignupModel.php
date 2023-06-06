<?php


require_once(dirname(__FILE__) . "../../transition/SignupTransition.php");




class SignupModel{
    public $pdo;
    public $statement;
    public $userInfo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        
    }

    //emailの値を取り出す
    public function getEmail($email){
 
        $this->statement = $this->pdo->prepare("SELECT * FROM `user` WHERE  email = :email");

        $this->statement->bindValue(':email', $email);
        $this->statement->execute();
        $this->userInfo = $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    // 登録されたユーザーを出たーベースに登録する
    public function insertUserInfo($username, $email, $hashed_password){
        if($username && $email && $hashed_password){
            echo "success";
            
            $this->statement = $this->pdo->prepare("INSERT INTO `user` (`username`, `email`, `password`) VALUES (:username, :email, :password)");
            $this->statement->bindValue(':username', $username);
            $this->statement->bindValue(':email', $email);
            $this->statement->bindValue(':password', $hashed_password);
        

            $this->statement->execute();

        } else{
            echo "fail";
        }

    
    }

}
