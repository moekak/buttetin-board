<?php
require_once(dirname(__FILE__) . "../../function/logout.php");



$logout = new logout;

if(isset($_POST["logout"])){
    $logout->logout();

    header("Location: ../../../index.php");


}