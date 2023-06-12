<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");

$post = new postService();

$post->comment($_POST);

echo $_POST["user_id"];
echo "<br>";
echo $_POST["post_id"];
echo "<br>";
echo $_POST["comment"];