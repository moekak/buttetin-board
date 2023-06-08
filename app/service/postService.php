<?php
require_once dirname(__FILE__) . "../../model/model.php";


session_start();
$user_id = $_SESSION["user_id"];



class postService
{
    public $model;
    public $title;
    public $body;
    public $date;
    public $userID;
    public $post;
  

    public function __construct()
    {
        $this->model = new model();
    }

    // データがpostで送られてきたら、変数に代入する処理
    public function checkData($post)
    {

        if (isset($_POST["title"])) {
            $this->title = $_POST["title"];
        }

        if (isset($_POST["body"])) {
            $this->body = $_POST["body"];
        }

        if (isset($_SESSION["user_id"])) {
            $this->userID = $_SESSION["user_id"];
        }
        $this->date = date('Y-m-d');
    }

// 送られてきた投稿をデーターベースに保存する処理
    public function dataService($post)
    {
        $this->checkData($post);
 
        if ($this->userID && $this->title && $this->body && $this->date) {
            $this->model->insertData($this->userID, $this->title, $this->body, $this->date);
             header("Location: http://localhost/Coding_practice/PHP_practice/buttetin-board" );
        } 
    }

    // データを取り出す処理
    public function getPostData(){
        $this->model->join();
        $this->post = $this->model->joinedData;
    }
}
