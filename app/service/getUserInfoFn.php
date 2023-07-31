<?php
require_once(dirname(__FILE__). "../../model/model.php");

session_start();

$user_id = "";
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
}

class getUserInfo{
    public $userID;
    public $model;
    public $iconData;
    public $userName;
    public $userEmail;
    public $user_id;
    public $userData;

    public function __construct()
    {
        $this->model = new model();
    }

    public function getUserIcon(){
        $this->userID = $_SESSION["user_id"];
        $this->model->getIcon($this->userID);
        $this->iconData = $this->model->userIcon;
    }
    public function getUserName(){
        $this->userID = $_SESSION["user_id"];
        $this->model->getName($this->userID);
        $this->userName = $this->model->userName;
    }
    public function getUserEmail(){
        $this->userID = $_SESSION["user_id"];
        $this->model->getEmail($this->userID);
        $this->userEmail = $this->model->userEmail;
    }

    public function getUserData($user_id){
        if(isset($_POST["user_id"])){
            $_SESSION["email"] = $this->model->getEmail($user_id);
            $_SESSION["username"] = $this->model->getName($user_id);
            // $_SESSION["icon"] = $this->model->getIcon($user_id);
            $_SESSION["intro"] = $this->model->getIntro($user_id);
            // $_SESSION["userData"] = $this->userData;
            $_SESSION["web"] = $this->model->getWeb($user_id);
            $_SESSION["created_at"] = $this->model->getDate($user_id);
            // print_r($_SESSION["userData"]);
            // exit;
            header("Location: ../../personalInfo.php");
        }
    }
    
    public function getUserDetail($user_id){
        if(isset($_POST["user_id"])){
           $this->model->getUser($user_id);
           $_SESSION["userDetail"] = $this->model->getUser($user_id);
            header("Location: ../../userDetail.php");
        }
    }
}

