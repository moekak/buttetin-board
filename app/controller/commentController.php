<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");

$post = new postService();
if(isset($_POST['postID'])){
   $post->getDetailData($_POST['postID']);   
}

// $post->comment($_POST);
// if(isset($_POST["post_id"])){
//     $post->updateCommentCount($_POST["post_id"]);
// }
