<?php


session_start();
$user_id = "";
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
}

class logout{
    public function logout(){
        session_destroy();
    }
}