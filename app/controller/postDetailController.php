<?php
require_once(dirname(__FILE__) . "../../service/postServiceFn.php");
require_once(dirname(__FILE__) . "../../service/getUserInfoFn.php");

$post = new postService();

$postData = "";

echo $_POST["post_id"];
$post->getDetailData($_POST["post_id"]);
$post->getPostCommentFn($_POST["post_id"]);



 




   
    




