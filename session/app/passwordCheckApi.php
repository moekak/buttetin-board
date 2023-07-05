<?php

session_start();

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data; // やりたい処理

$phone = $res[0];
$pass = $res[1];
$error = "";


$pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$statement = $pdo->prepare("SELECT * FROM `user` WHERE  id = :id");
$statement->bindValue(':id', $_SESSION["user_id"]);
$statement->execute();

$userInfo = $statement->fetch(PDO::FETCH_ASSOC);


if($userInfo["phone"] == $phone && password_verify($pass, $userInfo["password"])){
    $error = "success";

    $_SESSION["user_id"] = $userInfo["id"];
}else{
    $error = "error";
}


echo json_encode($error); 