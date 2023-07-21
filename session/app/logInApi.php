<?php

session_start();
$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data; // やりたい処理
$error = "";

$pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT * FROM `user` WHERE  phone = :phone");
$statement->bindValue(':phone', $res);
$statement->execute();

$userInfo = $statement->fetch(PDO::FETCH_ASSOC);



if ($userInfo) {

    $_SESSION['user_id'] = $userInfo['id'];
    $_SESSION["name"] = $userInfo['name'];
    $_SESSION["birthday"] = $userInfo['birthday'];
    $_SESSION["phone"] = $userInfo['phone'];
    if($userInfo['icon']){
        $_SESSION['icon'] = $userInfo['icon'];
    }

    $error = $data;
} else {
    $error = "error";
}

echo json_encode($error);
