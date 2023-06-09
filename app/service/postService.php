<?php
require_once dirname(__FILE__) . "../../model/model.php";


session_start();
$user_id = "";
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
}



class postService
{
    public $model;
    public $title;
    public $body;
    public $date;
    public $userID;
    public $post;
    public $like;
    public $likeCountData;
  

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

// 投稿削除処理
    public function deletPost($id, $postUser_id){
    
        echo $postUser_id;
        if($_SESSION["user_id"] == $postUser_id){
            $this->model->deletePost($id);
            header("Location: ../../index.php");
        } else{
            header("Location: ../../index.php");
            
        }
        
    }

    // ライク処理
    public function likePost($post_id){
        if(isset($_SESSION["user_id"])){
            $this->like = $this->model->checkLikePost($post_id, $_SESSION["user_id"]);
            if($this->like){
                $this->model->deleteLike($post_id, $_SESSION["user_id"]);
                header("Location: ../../index.php");
            } else{
                $this->model->likePost($_SESSION["user_id"], $post_id);
                header("Location: ../../index.php");
            }
           
        } else{
            
        }
    }

    // public function likeCount($post_id){
    //     $this->model->countLike($post_id);
    //     $this->likeCountData = $this->model->likeCount;
    // }
}
