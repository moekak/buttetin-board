<?php

require_once dirname(__FILE__) . "../../model/model.php";

class followingFn
{
    public $model;
    public $check = "";
    public $isChecked = "false";

    public function __construct()
    {
        $this->model = new model();
    }

    public function following($following, $follower)
    {
        // print_r($this->model->checkFollowing($following, $follower));
        // exit;
        // echo $following;
        // echo "</br>";
        // echo $follower;
        // exit;
        $this->model->checkFollowing($following, $follower);
        if ($this->model->data) {
            $this->model->unfollow($following, $follower);
            $_SESSION["changeColor"] = "white";
            $_SESSION["changeBG"] = "black";
        } else{
            $this->model->following($following, $follower);
            $this->isChecked = "true";
            $_SESSION["changeColor"] = "black";
            $_SESSION["changeBG"] = "white";
        }

        header("Location: ../../userDetail.php");

    }
}