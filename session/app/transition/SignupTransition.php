<?php


require_once(dirname(__FILE__) . "/../function/Validation.php");
require_once(dirname(__FILE__) . "/../model/signupModel.php");







class SignupTransition{
    
    public $username ;
    public $password ;
    public $icon ;
    public $hashed_password ;
    public $submit;
    public $errorsArray = [];
    public $email;
    public $obj;
    public $emailCheck;

    public function __construct()
    {
        $this->obj = new Validation();
        $this->emailCheck = new SignupModel();
    }

// メールが重複しているかチェックする処理
    public function emailCheck(){
        if(isset($_POST["email"])){
            $emailData = $this->emailCheck->getEmail($this->email);
            echo $emailData;
            exit;
       
        }
        
        if(empty($emailData)){
            echo $this->username;
            echo $this->password;
            echo $this->email;
           
            $this->emailCheck->insertUserInfo($this->username, $this->email, $this->hashed_password);
            header("Location: ../../../index.php");
        } else{
            header("Location: /../../view/signUp.php");
        }


    }


    public function user($post){
        if (isset($_POST["username"])) {
            $this->username = $_POST["username"]; 
           
        } 
        if (isset($_POST["email"])) {
            $this->email = $_POST["email"];
        }
        if (isset($_POST["password"])) {
            $this->password = $_POST["password"];
            $this->hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        }
        // if (isset($_FILES["icon"])) {
        //     $this->icon = $_FILES[$icon] ?? null;
        //     $imagePath = "";
        // }
        
        // if ($this->icon && $this->icon["tmp_name"]) {
        //     $imagePath = 'images/' . $this->obj->randomString(8) . '/' . $this->icon["name"];
        //     mkdir(dirname($imagePath));
        //     move_uploaded_file($this->icon["tmp_name"], $imagePath);
        // }

        $this->emailCheck($post);
        
    }
}

