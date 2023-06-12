<?php

class changeStyle
{
    public $border;
    public $text;
    public $placeholder;

    // likeの部分
    public $likeColor;

    public function changeStyleSignin()
    {

        $this->border = "2px solid red";
        $this->text = "red";
        $this->placeholder = "red";

        $styleArray = [$this->border, $this->text, $this->placeholder];

        // セッションで保存する
        session_start();

        $_SESSION["style"] = $styleArray;
    }

    public function changeStyleLogin(){
        session_start();
        $_SESSION["error"] = "error";
    }

 

}
