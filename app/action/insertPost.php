<?php
require_once(dirname(__FILE__) . "../../model/model.php");





session_start();
$user_id = $_SESSION["user_id"];
echo $user_id;


class insertPost{
    public $model;
    public $title;
    public $body;
    public $date;
    public $userID;

    public function __construct()
    {
        $this->model = new model();
    }

    public function checkData($post){
        
        if(isset($_POST["title"])){
            $this->title = $_POST["title"];
        }

        if(isset($_POST["body"])){
            $this->body = $_POST["body"];
        }

        if(isset($_SESSION["user_id"])){
            $this->userID = $_SESSION["user_id"];
        }
        $this->date = date('Y-m-d');

        $this->model->insertData($this->userID, $this->title, $this->body, $this->date);

        // $baseDir = dirname(__FILE__);
        // $redirectPath = $baseDir . "/../../../index.php";

        // header("Location:" .$redirectPath);
    }
}

