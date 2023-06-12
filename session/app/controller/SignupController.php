<?php

require_once dirname(__FILE__) . "../../function/signupFn.php";




$obj = new signupFn();
if(isset($_POST, $_FILES)){
    $obj->user($_POST, $_FILES);
}

$succesMesaage = $obj->textSucess;
