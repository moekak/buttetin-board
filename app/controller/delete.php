<?php
require_once(dirname(__FILE__) . "../../service/postService.php");

$post = new postService();

if(isset($_POST["user_id"])){
    $post->deletPost($_POST["id"], $_POST["user_id"]);
}