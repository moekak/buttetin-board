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
    public function insertUserInfo($icon, $user_id){
        if($icon){
        
            
            $statement = $this->pdo->prepare("UPDATE `user` SET `icon` = :icon  WHERE id = :id");
            $statement->bindValue(':icon', $icon);
            $statement->bindValue(':id', $user_id);

        

            $statement->execute();


        } 
    
    }

}
