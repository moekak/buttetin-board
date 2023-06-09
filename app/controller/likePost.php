<?php

require_once(dirname(__FILE__) . "../../service/postService.php");

$service = new postService();
$service->likePost($_POST["id"]);
$service->likeCount($_POST["id"]);
$count = $service->likeCountData;


