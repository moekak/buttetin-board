<?php

require_once dirname(__FILE__) . "/../function/ValidationFn.php";
require_once dirname(__FILE__) . "/../model/signupModel.php";
require_once dirname(__FILE__) . "/../../../app/service/changeStyleFn.php";



session_start();

class signupFn
{
    public $icon;
    public $filename;
    public $obj;
    public $imagePath;
    public $model;
    


   
    public function __construct()
    {
        $this->obj = new Validation();
        $this->model = new SignupModel();
        // $this->style = new changeStyle();

    }

    public function checkData(){
        if($_FILES["icon"]){
            $this->icon = $_FILES["icon"];
        } else{
            header("Location: ../../../index2.php" );
        }
        if($this->icon && $this->icon["tmp_name"]){
            if (!file_exists("../../images2")) {
                mkdir("../../images2");
            }

            $this->filename = $this->obj->randomString(8) . '/' . $this->icon["name"];
            $this->imagePath = '../../../images/';

            mkdir(dirname($this->imagePath . $this->filename));
            move_uploaded_file($this->icon["tmp_name"], $this->imagePath . $this->filename);
        } else{
            header("Location: ../../../index.php" );
        }
    }

    public function insertIcon(){
      
        $this->checkData();
        if($_SESSION["user_id"] && $this->icon){
            $this->model->insertUserInfo($this->filename, $_SESSION["user_id"]);
            $_SESSION["icon"] = $this->filename;
            header("Location: ../../../index.php" );
        } 
    }




}