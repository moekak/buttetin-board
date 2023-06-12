<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");

$service = new postService();

if(isset($_POST["id"])){
    $service->likePost($_POST["id"]);
}











// $count = $service->likeCountData;


