<?php

require_once dirname(__FILE__) . "../../../app/model/editModel.php";
require_once dirname(__FILE__) . "../../../app/function/ValidationFn.php";




class profileEditFn{
    public $model;
    public $username = "";
    public $introduction = "";
    public $web_site= "";
    public $birthday = "";
    public $user_id = "";
    public $icon = "";
    public $filename = "";
    public $obj;
    public $imagePath;
    public $country;
    public $location;

    public function __construct()
    {
        $this->model = new editModel();
        $this->obj = new Validation();
    }

    public function update($post){
        $this->checkData($post);
        if($this->user_id){
            if(!$this->username == ""){
                $this->model->updateUsername($this->username, $this->user_id);
                $_SESSION["name"] = $this->username;
            }
            if(!$this->introduction == ""){
                $this->model->updateIntro($this->introduction, $this->user_id);
                $_SESSION["introduction"] = $this->introduction;
            }
            if(!$this->web_site == ""){
                if(substr($this->web_site, 0, 7) != "http://" && substr($this->web_site, 0, 8) != "https://"){
                    $this->web_site = "http://" . $this->web_site;
                }
                if(filter_var($this->web_site, FILTER_VALIDATE_URL)){
                    $this->model->updateWeb($this->web_site, $this->user_id);
                    $_SESSION["web_site"] = $this->web_site;
                    // echo $_SESSION["web_site"];
                }
                    
            }
            if(!$this->birthday == ""){
                $this->model->updateBirthday($this->birthday, $this->user_id);
                $_SESSION["birthday"] = $this->birthday;
            }
            if(!$this->country == ""){
                $this->model->updateCountry($this->country, $this->user_id);
                $_SESSION["country"] = $this->country;
            }
            if($_FILES["icon"]["tmp_name"]) {
                $this->model->updateIcon($this->filename, $this->user_id);
                $_SESSION["icon"] = $this->filename;
            }
         
            header("Location: ../../personalInfo.php");
        }


    }

    public function checkData($post){
        if(isset($_POST["username"])){
            $this->username = $_POST["username"];
        } else{
            $this->username = "";
        }

        if(isset($_POST["introduction"])){
            $this->introduction = $_POST["introduction"];
        } else{
            $this->introduction = "";
        }

        if(isset($_POST["web_site"])){
            $this->web_site = $_POST["web_site"];
        } else{
            $this->web_site = "";
        }

        if(isset($_POST["birthday"])){
            $this->birthday = $_POST["birthday"];
        } else{
            $this->birthday = "";
        }

        if(isset($_POST["user_id"])){
            $this->user_id = $_POST["user_id"];
        } else{
            $this->user_id = "";
        }

        if(isset($_FILES["icon"])){
            $this->icon = $_FILES["icon"];
        } else{
            $this->icon = "";
        }

        if(isset($_POST["country"])){
            $this->country = $_POST["country"];
        } else{
            $this->country = "";
        }

      

        if($this->icon && $this->icon["tmp_name"]) {

            if (!file_exists("../../images")) {
                mkdir("../../images");
            }
            $this->filename = $this->obj->randomString(8) . "/" . $this->icon["name"];
            $this->imagePath = '../../images/';

            mkdir(dirname($this->imagePath. $this->filename));
            move_uploaded_file($this->icon["tmp_name"], $this->imagePath. $this->filename);

        }

    
    }

}

