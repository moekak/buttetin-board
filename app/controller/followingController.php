<?php
require_once(dirname(__FILE__) . "../../service/followingFn.php");

session_start();

$following = new followingFn();

$following->following($_POST["following_id"], $_SESSION["user_id"]);
