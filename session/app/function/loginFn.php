<?php
session_start();
require_once dirname(__FILE__) . "../../model/logInModel.php";
require_once dirname(__FILE__) . "../../function/changeStyle.php";

class loginFn
{
    public $username;
    public $email;
    public $password;
    public $userDataArray;
    public $loginModel;
    public $border;
    public $text;
    public $placeholder; 
    public $style;

    public function __construct()
    {
        $this->loginModel = new logInModel();
        $this->style = new changeStyle();
    }

    public function getUserData()
    {
        if (isset($_POST["username"])) {
            $this->username = $_POST["username"];
        }

        if (isset($_POST["email"])) {
            $this->email = $_POST["email"];
        }
        if (isset($_POST["password"])) {
            $this->password = $_POST["password"];
        }

    }

    public function checkUserData($post)
    {
        $this->getUserData();
        $this->loginModel->checkUser($this->username, $this->email);
        $userData = $this->loginModel->userData;

        var_dump($userData);

        if (empty($userData)) {
            header("Location: ../../view/logIn.php");
            $this->style->changeStyleLogin();

        } else {
            if($_SESSION["error"]){
                unset($_SESSION["error"]);
            }
            header("Location: ../../../index.php");
        }

    }

    public function changeStyle()
    {

        $this->border = "2px solid red";
        $this->text = "red";
        $this->placeholder = "red";

        $styleArray = [$this->border, $this->text, $this->placeholder];

        // セッションで保存する
        session_start();

        $_SESSION["style"] = $styleArray;
    }

}
