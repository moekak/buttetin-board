<?php

require_once(dirname(__FILE__) . "../../service/getUserInfoFn.php");

$fnc = new getUserInfo();




$fnc->getUserDetail($_POST["user_id"]);
