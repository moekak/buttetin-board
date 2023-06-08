<?php


require_once(dirname(__FILE__) . "/../function/Validation.php");
require_once(dirname(__FILE__) . "/../model/signupModel.php");
require_once(dirname(__FILE__) . "/../../app/function/changeStyle.php");


session_start();



class signupFn{
    
    public $username ;
    public $password ;
    public $icon ;
    public $imagePath;
    public $hashed_password ;
    public $submit;
    public $errorsArray = [];
    public $email;
    public $obj;
    public $emailCheck;
    public $style;
    public $filename = "";

    public function __construct()
    {
        $this->obj = new Validation();
        $this->emailCheck = new SignupModel();
        $this->style = new changeStyle();

    }

// メールが重複しているかチェックする処理
    public function emailCheck(){
      
        if(isset($_POST["email"])){
            $this->emailCheck->getEmail($this->email);
            $emailData = $this->emailCheck->userInfo;
        } 
        
        if(!$emailData){
            
            $this->emailCheck->insertUserInfo($this->username, $this->email, $this->hashed_password, $this->filename);
            if($_SESSION["style"]){
                echo "ok";
                unset($_SESSION["style"]);
            }

            
            header("Location: ../../../index.php");
            
            
        } else{
            header("Location: ../../view/signUp.php");
            $this->style->changeStyleSignin();
        }


    }


    public function user($post, $file){
       
        if (isset($_POST["username"])) {
            $this->username = $_POST["username"]; 
           
        } 
        if (isset($_POST["email"])) {
            $this->email = $_POST["email"];
        }
        if (isset($_POST["password"])) {
            $this->password = $_POST["password"];
            $this->hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        } if(isset($_FILES["icon"])){
            $this->icon = $_FILES["icon"];
            $this->imagePath = "";
        }

        if ($this->icon && $this->icon["tmp_name"]) {
            $this->filename = $this->obj->randomString(8) . '/' . $this->icon["name"];
            $this->imagePath = '../../../images/';
            
            mkdir(dirname($this->imagePath. $this->filename));
            move_uploaded_file($this->icon["tmp_name"], $this->imagePath. $this->filename);
        }

        $this->emailCheck();
        
    }
}
