<?php

require_once(dirname(__FILE__) . "../../service/postServiceFn.php");
require_once(dirname(__FILE__) . "../../../session/app/function/profileEditFn.php");
require_once(dirname(__FILE__) . "../../../session/app/function/signupFn.php");


$edit = new postService;
$function = new profileEditFn();
$icon = new signupFn();



// if(isset($_FILES["bg-img"])){
//     $edit->insertBG();
// }




// if(isset($_POST["submitBio"])){
//     $function->update($_POST);
    
// }

// if(isset($_POST["submitLocation"])){
//     $function->update($_POST);
// }


if(isset($_POST["save"])){
    $function->update($_POST);
}
