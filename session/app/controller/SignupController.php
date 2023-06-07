<?php

require_once dirname(__FILE__) . "../../function/signupFn.php";




$obj = new signupFn();
$obj->user($_POST, $_FILES);
