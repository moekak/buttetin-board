<?php


class model {
    public $pdo;
    public $postData;
    public $name;
    public $id;
    public $insertedId;
    public $joinedData;
    public $userIcon;
    public $userName;
    public $userEmail;
    public $likeData;
    public $likeCount;
    

    

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    // 投稿のデータを保存する
    public function insertData($user_id, $title, $body, $date, $image){
      
        $statement = $this->pdo->prepare("INSERT INTO `board-table`(`user_id`, `title`, `body`, `date`, `image`) VALUES (:user_id, :title, :body, :date, :image)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":title", $title);
        $statement->bindValue(":body", $body);
        $statement->bindValue(":image", $image);
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
        $statement = $this->pdo->prepare("SELECT * FROM `user` INNER JOIN `board-table` ON `user`.`id` = `board-table`.`user_id` ORDER BY `board-table`.`created_at` DESC;");
        $statement->execute();
        $this->joinedData = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // アイコン画像を取り出す
    public function getIcon($user_id){
        $statement = $this->pdo->prepare("SELECT `icon` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }
    // 名前を取り出す
    public function getName($user_id){
        $statement = $this->pdo->prepare("SELECT `username` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
       return $statement->fetchColumn();
    }
    // メールを取り出す
    public function getEmail($user_id){
        $statement = $this->pdo->prepare("SELECT `email` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }
    public function getIntro($user_id){
        $statement = $this->pdo->prepare("SELECT `introduction` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }
    public function getWeb($user_id){
        $statement = $this->pdo->prepare("SELECT `web_site` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }
    public function getBirthday($user_id){
        $statement = $this->pdo->prepare("SELECT `birthday` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }
    public function getDate($user_id){
        $statement = $this->pdo->prepare("SELECT `created_at` FROM `user` WHERE id = :id");
        $statement->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
    }

    // 投稿削除する
    public function deletePost($id){
        $statement = $this->pdo->prepare("DELETE FROM `board-table` WHERE post_id = :post_id");
        $statement->bindValue(":post_id", $id);
        $statement->execute();

    }
    // 投稿にいいねする
    public function likePost($user_id, $post_id){
        $statement = $this->pdo->prepare("INSERT INTO `like-table`(`user_id`, `post_id`) VALUES (:user_id, :post_id)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
    }
    // 投稿に二回以上いいねするのを防ぐ処理
    public function checkLikePost($post_id, $user_id){
        $statement = $this->pdo->prepare("SELECT `id` from `like-table` WHERE post_id = :post_id AND user_id = :user_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
        return $statement->fetchColumn();
  
       
    }
    // いいねを消す処理
    public function deleteLike($post_id, $user_id){
        $statement = $this->pdo->prepare("DELETE FROM `like-table` WHERE post_id = :post_id AND user_id = :user_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();
    }
    // 各投稿のいいねの件数を取得
    public function countLike($post_id){      

        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM `like-table` WHERE post_id = :post_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        $this->likeCount = $statement->fetchColumn();
    }


    // コメントをデーターベースに保存する
    public function insertComment($user_id, $post_id, $comment){
        $statement = $this->pdo->prepare("INSERT INTO `comment`(`user_id`, `post_id`, `comment`) VALUES (:user_id, :post_id,:comment)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $post_id);
        $statement->bindValue(":comment", $comment);
        $statement->execute();
    }

    // 詳細ページの投稿を取得する
    public function getPostDetail($post_id){
        $statement = $this->pdo->prepare("SELECT * FROM `board-table` WHERE post_id = :post_id");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // テーブル結合の処理
    public function joinPost($post_id){
        $statement = $this->pdo->prepare("SELECT * FROM `board-table` INNER JOIN `user` ON `user`.`id` = `board-table`.`user_id` WHERE `board-table`.`post_id`=:post_id;");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
       
    }
    // 詳細ページの投稿のコメントを取得する
    public function getPostComment($post_id){
        $statement = $this->pdo->prepare("SELECT * FROM `comment` INNER JOIN `board-table` ON `comment`.`post_id` = `board-table`.`post_id` WHERE `board-table`.`post_id`=:post_id;");
        $statement->bindValue(":post_id", $post_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    

    // ユーザーの情報を取り出す
    public function getUser($user_id){
        $statement  = $this->pdo->prepare("SELECT * FROM `user` WHERE id = :id");
        $statement ->bindValue(":id", $user_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    // コメント件数を獲得する
    // public function getCommentCount($post_id){
    //     $statement = $this->pdo->prepare("SELECT * FROM `board-table`");
    //     $statement->bindValue(":id", $post_id);
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // コメント件数をupdateする
    public function updateComment($post_id){
        $statement = $this->pdo->prepare("UPDATE `board-table` SET  comments_count= comments_count + 1 WHERE id = :id");
        $statement->bindValue(":id", $post_id);
        $statement->execute();
    }
}