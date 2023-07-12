<?php
require_once dirname(__FILE__) . "../../model/model.php";
require_once dirname(__FILE__) . "../../service/changeStyleFn.php";
require_once dirname(__FILE__) . "../../../session/app/function/ValidationFn.php";

session_start();
$user_id = "";
if (isset($_SESSION["user_id"])) {
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
    public $postComment;
    public $service;
    public $image;
    public $filename;
    public $obj;

    public function __construct()
    {
        $this->model = new model();
        $this->service = new changeStyle();
        $this->obj = new Validation();
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
        if (isset($_FILES["image"])) {
            $this->image = $_FILES["image"];
        }

        if ($this->image && $this->image["tmp_name"]) {
            if (!file_exists("../../images2")) {
                mkdir("../../images2");
            }

            $this->filename = $this->obj->randomString(8) . "/" . $this->image["name"];
            $imagePath = '../../images2/';

            mkdir(dirname($imagePath . $this->filename));
            move_uploaded_file($this->image["tmp_name"], $imagePath . $this->filename);

        }
        $this->date = date('Y-m-d');
    }

// 送られてきた投稿をデーターベースに保存する処理
    public function dataService($post)
    {
        $this->checkData($post);
        $this->model->insertData($this->userID, $this->title, $this->body, $this->date, $this->filename);
        header("Location: http://localhost/Coding_practice/PHP_practice/buttetin-board");
    }

    // データを取り出す処理
    public function getPostData()
    {
        $this->model->join();
        $this->post = $this->model->joinedData;
        $_SESSION["postData"] = $this->post;

    }

// 投稿削除処理
    public function deletPost($id, $postUser_id)
    {

        if ($_SESSION["user_id"] == $postUser_id) {
            $this->model->deletePost($id);
            header("Location: ../../index.php");
        } else {
            header("Location: ../../index.php");

        }

    }

    // ライク処理
    public function likePost($post_id, $post)
    {

        if (isset($_SESSION["user_id"])) {
            $this->like = $this->model->checkLikePost($post_id, $_SESSION["user_id"]);

            if ($this->like) {
                $this->model->deleteLike($post_id, $_SESSION["user_id"]);
                $this->service->changeStyleLike2();
                $_SESSION["like"] = "like";
                if ($post) {
                    header("Location: ../../postDetail.php");
                } else {
                    header("Location: ../../index.php");
                }
            } else {
                $this->model->likePost($_SESSION["user_id"], $post_id);
                $this->service->changeStyleLike();
                $_SESSION["like"] = "removeLike";

                if ($post) {
                    header("Location: ../../postDetail.php");
                } else {
                    header("Location: ../../index.php");
                }
            }

        } else {

        }
    }

    public function getLikeCount($post_id)
    {
        $this->model->countLike($post_id);
        $this->likeCount = $this->model->likeCount;

    }

    // データがpostで送られてきたら、変数に代入する処理
    public function checkCommentData($post)
    {

        if (isset($_POST["user_id"])) {
            $this->commentUserID = $_POST["user_id"];
        }

        if (isset($_POST["id"])) {
            $this->commentPostID = $_POST["id"];
        }

        if (isset($_POST["comment"])) {
            $this->comment = $_POST["comment"];
        }
    }

    // コメント保存処理
    public function comment($post)
    {
        $this->checkCommentData($post);
        if ($this->commentUserID && $this->commentPostID && $this->comment) {
            // echo '222';
            $this->model->insertComment($this->commentUserID, $this->commentPostID, $this->comment);

            header("Location: ../../index.php");
        } else{
            header("Location: ../../comment.php");
        }

    }

    // 詳細ページのデータ処理
    public function getDetailData($post_id)
    {
        $this->detailData = $this->model->joinPost($post_id);
        $_SESSION["post"] = $this->detailData;
        header("Location: /Coding_practice/PHP_practice/buttetin-board/comment.php");

    }
    // 詳細ページ取得
    public function getPostCommentFn($post_id)
    {
        $this->postComment = $this->model->getPostComment($post_id);
        $_SESSION["post_comment"] = $this->postComment;
        header("Location: /Coding_practice/PHP_practice/buttetin-board/postDetail.php");

    }

    // コメント件数update
    public function updateCommentCount($post_id)
    {
        if ($_POST["id"]) {
            $this->model->updateComment($post_id);
            header("Location: /Coding_practice/PHP_practice/buttetin-board/index.php");
        }
    }
}