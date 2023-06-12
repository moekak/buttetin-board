<?php
require_once(dirname(__FILE__) . "../../model/SignupModel.php");

class Validation{
    public $signup;

    public function __construct(){
        $this->signup = new SignupModel();
    }
    
    public function randomString($n){
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = "";
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str = $str . $characters[$index];
        }
        return $str;
    }

}


