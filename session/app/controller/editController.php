<?php

require_once(dirname(__FILE__) . "../../../app/function/profileEditFn.php");

$function = new profileEditFn();
// echo $_POST["country"];
// exit;
if($_POST["submit"]){
    $function->update($_POST);
    
}


