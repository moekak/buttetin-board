<?php
session_start();

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data ; // やりたい処理

$user_id = $_SESSION["user_id"];

$pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if(isset($_SESSION["user_id"])){
    $statement = $pdo->prepare("SELECT `id` from `like-table` WHERE post_id = :post_id AND user_id = :user_id");
    $statement->bindValue(":post_id", $data);
    $statement->bindValue(":user_id", $user_id);
    try{
        $statement->execute();
    }catch(PDOException $e){
        echo json_encode(['error' => $e->getMessage()]);
        // echo 'Error: ' . $e->getMessage();
    
    }
    
    $statement->execute();
    $post_id = $statement->fetchColumn();

    if($post_id){
        $statement = $pdo->prepare("DELETE FROM `like-table` WHERE post_id = :post_id AND user_id = :user_id");
        $statement->bindValue(":post_id", $res);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        $statement = $pdo->prepare("UPDATE `board-table` SET `likes_count` = `likes_count` - 1 WHERE id = :id");
        $statement->bindValue(":id", $res);
        $statement->execute();

        
    } else{
        $statement = $pdo->prepare("INSERT INTO `like-table`(`user_id`, `post_id`) VALUES (:user_id, :post_id)");
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":post_id", $res);
        $statement->execute();

        $statement = $pdo->prepare("UPDATE `board-table` SET `likes_count` = `likes_count` + 1 WHERE id = :id");
        $statement->bindValue(":id", $res);
        $statement->execute();


        
    }
   
} 


$statement = $pdo->prepare("SELECT `likes_count` from `board-table` WHERE id = :id");
$statement->bindValue(":id", $res);
$statement->execute();
$likeCount = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["likesCount"] = $likeCount;



echo json_encode($likeCount); // json形式にして返す

