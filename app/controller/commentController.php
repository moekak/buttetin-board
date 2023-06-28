<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");

$post = new postService();

$post->comment($_POST);
if(isset($_POST["post_id"])){
    $post->updateCommentCount($_POST["post_id"]);
}

