<?php
require_once(dirname(__FILE__) . "../../action/insertPost.php");

$obj = new insertPost();
$obj->checkData($_POST);

