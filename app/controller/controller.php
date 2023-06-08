<?php
require_once(dirname(__FILE__) . "../../service/postService.php");


$obj = new postService();


// 投稿をデータベースに保存
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $obj->dataService($_POST);
}

// 投稿を取り出す
$obj->getPostData();
$postData = $obj->post;




