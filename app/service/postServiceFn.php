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
    public $likeCount;
    public $commentUserID;
    public $commentPostID;
    public $comment;
    public $detailData;
  

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
        $_SESSION["postData"] = $this->post;
       
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
        echo $_SESSION["user_id"];
        if(isset($_SESSION["user_id"])){
            $this->like = $this->model->checkLikePost($post_id, $_SESSION["user_id"]);
            echo "ooo";
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

    public function getLikeCount($post_id){
        $this->model->countLike($post_id);
        $this->likeCount = $this->model->likeCount;
  
    }
    
    // データがpostで送られてきたら、変数に代入する処理
    public function checkCommentData($post)
    {

        if (isset($_POST["user_id"])) {
            $this->commentUserID = $_POST["user_id"];
        }

        if (isset($_POST["post_id"])) {
            $this->commentPostID = $_POST["post_id"];
        }

        if (isset($_POST["comment"])) {
            $this->comment = $_POST["comment"];
        }
    }


    // コメント保存処理
    public function comment($post){
        $this->checkCommentData($post);
        if($this->commentUserID && $this->commentPostID && $this->comment){
            $this->model->insertComment($this->commentUserID, $this->commentPostID, $this->comment);

            header("Location: ../../index.php");
        } 

    }

    // 詳細ページのデータ処理
    public function getDetailData($post_id){
        $this->detailData = $this->model->joinPost($post_id);
        $_SESSION["post"] = $this->detailData;
        header("Location: /Coding_practice/PHP_practice/buttetin-board/postDetail.php");

    }
}
