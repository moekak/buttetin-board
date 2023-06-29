<?php
require_once(dirname(__FILE__) . "../../service/postServiceFn.php");
require_once(dirname(__FILE__) . "../../service/getUserInfoFn.php");
require_once(dirname(__FILE__) . "../../model/model.php");


$obj = new postService();
$user = new getUserInfo();
$model = new model();

// 投稿をデータベースに保存
if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "ok";

    $obj->dataService($_POST);
}

// 投稿を取り出す
$obj->getPostData();
$postData = $obj->post;

 $userIcon = "";
 $userName = "";
if(isset($_SESSION["user_id"])){
    $user->getUserIcon();
    $userIcon = $user->iconData;

    $user->getUserName();
    $userName = $user->userName;

    $user->getUserEmail();
    $userEmail = $user->userEmail;
   
} else{
    $userIcon = "../assets/img/user-dummy.png";

}


