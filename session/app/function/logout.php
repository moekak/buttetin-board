<?php


session_start();


class logout{
    public function logout(){
        session_destroy();
    }
}