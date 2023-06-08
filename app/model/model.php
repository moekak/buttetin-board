<?php


class model {
    public $pdo;
    public $postData;
    public $name;
    public $id;
    public $insertedId;
    public $joinedData;
    

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    // 投稿のデータを保存する
    public function insertData($user_id, $title, $body, $date){
      
        $statement = $this->pdo->prepare("INSERT INTO `board-table`(`user_id`, `title`, `body`, `date`) VALUES (:user_id, :title, :body, :date)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":title", $title);
        $statement->bindValue(":body", $body);
        $statement->bindValue(":date", $date);
    
        $statement->execute();

    }
  
    //投稿のデータを取り出す
    public function getPostDate(){
        $statement = $this->pdo->prepare("SELECT * FROM `board-table`");
        $statement->execute();
        $this->postData = $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    // テーブル結合の処理
    public function join(){
        $statement = $this->pdo->prepare("SELECT * FROM `user` INNER JOIN `board-table` ON `user`.`id` = `board-table`.`user_id`;");
        $statement->execute();
        $this->joinedData = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}