<?php
require_once(dirname(__FILE__) . "../../../app/service/getUserInfoFn.php");

$functon = new getUserInfo();

echo $_POST["user_id"];

if($_POST["user_id"]){
    $functon->getUserData($_POST["user_id"]);
    $_SESSION["userData"] = $functon->userData;
    
    
}