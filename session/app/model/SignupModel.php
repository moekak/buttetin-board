<?php





class SignupModel{
    public $pdo;
    public $userInfo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    //emailの値を取り出す
    public function getEmail($email){
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE  email = :email");

        $statement->bindValue(':email', $email);
        $statement->execute();

        $this->userInfo = $statement->fetch(PDO::FETCH_ASSOC);
    }

    // 登録されたユーザーをデーターベースに登録する
    public function insertUserInfo($username, $email, $hashed_password, $icon, $date){
        if($username && $email && $hashed_password){
        
            
            $statement = $this->pdo->prepare("INSERT INTO `user` (`username`, `email`, `password`, `icon`, `created_at`) VALUES (:username, :email, :password, :icon, :created_at)");
            $statement->bindValue(':username', $username);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $hashed_password);
            $statement->bindValue(':icon', $icon);
            $statement->bindValue(':created_at', $date);
        

            $statement->execute();

            $user_id = $this->pdo->lastInsertId();

            session_start();
            $_SESSION["user_id"] = $user_id;

        } 
    
    }

}
