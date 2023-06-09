<?php


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
}

