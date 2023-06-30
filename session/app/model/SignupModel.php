<?php





class SignupModel{
    public $pdo;
    public $userInfo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    //emailの値を取り出す
    public function getPhone($phone){
        $statement = $this->pdo->prepare("SELECT * FROM `user` WHERE  phone = :phone");

        $statement->bindValue(':phone', $phone);
        $statement->execute();

        $this->userInfo = $statement->fetch(PDO::FETCH_ASSOC);
    }

    // 登録されたユーザーをデーターベースに登録する
    public function insertUserInfo($username, $phone, $hashed_password, $date, $birthday){
        if($username && $phone && $hashed_password){
        
            
            $statement = $this->pdo->prepare("INSERT INTO `user` (`username`, `phone`, `password`, `icon`, `created_at`, `birthday`) VALUES (:username, :phone, :password, :icon, :created_at, :birthday)");
            $statement->bindValue(':username', $username);
            $statement->bindValue(':email', $phone);
            $statement->bindValue(':password', $hashed_password);
            $statement->bindValue(':birthday', $birthday);
            $statement->bindValue(':created_at', $date);
        

            $statement->execute();

            $user_id = $this->pdo->lastInsertId();

            session_start();
            $_SESSION["user_id"] = $user_id;

        } 
    
    }

}
