<?php 

require_once(dirname(__FILE__) . "../../function/loginFn.php");


$login = new loginFn();


$login->checkUserData($_POST);

