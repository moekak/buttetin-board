<?php

require_once dirname(__FILE__) . "/../function/ValidationFn.php";
require_once dirname(__FILE__) . "/../model/signupModel.php";
require_once dirname(__FILE__) . "/../../../app/service/changeStyleFn.php";

// class signupFn
// {

//     public $username;
//     public $password;
//     public $icon;
//     public $imagePath;
//     public $hashed_password;
//     public $submit;
//     public $errorsArray = [];
//     public $phone;
//     public $obj;
//     public $phoneCheck;
//     public $style;
//     public $filename = "";
//     public $textSucess;
//     public $now;

//     public function __construct()
//     {
//         $this->obj = new Validation();
//         $this->phoneCheck = new SignupModel();
//         $this->style = new changeStyle();

//     }

// // 電話番号が重複しているかチェックする処理
//     public function phoneCheck($username, $phone, $hashed_password, $birthd)
//     {

//         $this->phoneCheck->getPhone($this->phone);
//         $phoneData = $this->phoneCheck->userInfo;

//         if (!$phoneData) {
//             $this->now = date('Y-m-d H:i:s');

//             $this->phoneCheck->insertUserInfo($username, $phone, $hashed_password, $this->now, $birthday);
//             $_SESSION["email"] = $this->phone;
//             $_SESSION["username"] = $this->username;
//             $_SESSION["icon"] = $this->filename;
//             $_SESSION["birthday"] = $birthday;
//             $_SESSION["created_at"] = $this->now;
//             if ($_SESSION["style"]) {
//                 unset($_SESSION["style"]);
//             }
 
//         } 

//     }

//     public function user($post, $file)
//     {

//         if (isset($_POST["username"])) {
//             $this->username = $_POST["username"];

//         }
//         if (isset($_POST["email"])) {
//             $this->email = $_POST["email"];
//         }
//         if (isset($_POST["password"])) {
//             $this->password = $_POST["password"];
//             $this->hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
//         }if (isset($_FILES["icon"])) {
//             $this->icon = $_FILES["icon"];
//             $this->imagePath = "";
//         }

//         if ($this->icon && $this->icon["tmp_name"]) {
//             $this->filename = $this->obj->randomString(8) . '/' . $this->icon["name"];
//             $this->imagePath = '../../../images/';

//             mkdir(dirname($this->imagePath . $this->filename));
//             move_uploaded_file($this->icon["tmp_name"], $this->imagePath . $this->filename);
//         }

//         $this->emailCheck();

//     }


// }



class signupFn
{
    public $icon;

   
    public function __construct()
    {
        // $this->obj = new Validation();
        // $this->style = new changeStyle();

    }

    public function checkData(){
        if($_FILES["icon"]){
            $this->icon = $_FILES["icon"];
        }
        if($this->icon && $this->icon["tmp_name"]){
            if (!file_exists("../../images2")) {
                mkdir("../../images2");
            }

            $this->filename = $this->obj->randomString(8) . '/' . $this->icon["name"];
            $this->imagePath = '../../../images/';

            mkdir(dirname($this->imagePath . $this->filename));
            move_uploaded_file($this->icon["tmp_name"], $this->imagePath . $this->filename);
        }
    }




}