<?php

session_start();

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data; // やりたい処理
$check = "";


$name = $res[0];
$phone = $res[1];
$birthday = $res[2];
$password = $res[3];
$now = date('Y-m-d H:i:s');
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM `user` WHERE  phone = :phone");
$statement->bindValue(':phone', $phone);
$statement->execute();

$userInfo = $statement->fetch(PDO::FETCH_ASSOC);

if (!$userInfo) {
 

    $statement = $pdo->prepare("INSERT INTO `user` (`name`, `phone`, `password`, `created_at`, `birthday`) VALUES (:name, :phone, :password,  :created_at, :birthday)");
    $statement->bindValue(':name', $name);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password_hash);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':created_at', $now);

    $statement->execute();

    $user_id = $pdo->lastInsertId();


    $_SESSION["user_id"] = $user_id;
    $_SESSION["name"] = $name;
    $_SESSION["birthday"] = $birthday;

    $check = "success";
} else {
    $check = "error";
}
echo json_encode($check);
