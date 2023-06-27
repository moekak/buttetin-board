<?php

class changeStyle
{
    public $border;
    public $text;
    public $placeholder;
    public $likeBackground;
    public $likeNum;

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


    public function changeStyleLike(){
        $this->likeBackground = "red";
        $this->likeNum = "red";
        $likeArray = [$this->likeBackground, $this->likeNum];

        session_start();
        $_SESSION["likeStyle"] = $likeArray;
        
    }
    public function changeStyleLike2(){
        $this->likeBackground = "rgba(0, 0, 0, 0.575)";
        $this->likeNum = "rgba(0, 0, 0, 0.575)";
        $likeArray = [$this->likeBackground, $this->likeNum];

        session_start();
        $_SESSION["likeStyle"] = $likeArray;
        
    }
 

}
