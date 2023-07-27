<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");

$edit = new postService;




if($_FILES["bg-img"]){
    $edit->insertBG();

}