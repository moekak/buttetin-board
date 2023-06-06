<?php 

require_once(dirname(__FILE__) . "../../transition/SignupTransition.php");



 $obj = new SignupTransition();
 $obj->user($_POST);