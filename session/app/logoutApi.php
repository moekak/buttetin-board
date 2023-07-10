<?php

session_start();

$raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
$data = json_decode($raw); // json形式をphp変数に変換

$res = $data; // やりたい処理
$check = '';


unset($_SESSION['user_id']);

if(!isset($_SESSION['user_id'])){
      $check= 'success2';
} else{
      $check = 'error2';
}
echo json_encode($check);