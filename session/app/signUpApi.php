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
date_default_timezone_set('Asia/Tokyo');
$now = date('Y-m-d H:i:s');
$now2 = date('His');
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$login = "@" . $name . $now2;

$pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM `user` WHERE  phone = :phone");
$statement->bindValue(':phone', $phone);
$statement->execute();

$userInfo = $statement->fetch(PDO::FETCH_ASSOC);

if (!$userInfo) {
 

    $statement = $pdo->prepare("INSERT INTO `user` (`name`, `phone`, `password`, `created_at`, `birthday`, `login_name`) VALUES (:name, :phone, :password,  :created_at, :birthday, :login_name)");
    $statement->bindValue(':name', $name);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password_hash);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':created_at', $now);
    $statement->bindValue(':login_name', $login);

    $statement->execute();

    $user_id = $pdo->lastInsertId();


    $_SESSION["user_id"] = $user_id;
    $_SESSION["name"] = $name;
    $_SESSION["birthday"] = $birthday;
    $_SESSION["created_at"] = $now;
    $_SESSION["country"] = '';
    $_SESSION["introduction"] = '';
    $_SESSION["web_site"] = '';
    $_SESSION["phone"] = $phone;
    $_SESSION["login_name"] = $login;

    $check = "success";
} else {
    $check = "error";
}


echo json_encode($check);
