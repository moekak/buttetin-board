<?php
require_once dirname(__FILE__) . "/app/controller/controller.php";
require_once dirname(__FILE__) . "/session/app/function/signupFn.php";
require_once dirname(__FILE__) . "/app/controller/likePost.php";
require_once dirname(__FILE__) . "/app/service/postServiceFn.php";

$signup = new signupFn();
$like = new postService();

$path = "./images/";

// echo $_SESSION["user_id"];
$post = $_SESSION["postData"];

// $counts = $_SESSION["likesCount"];
$userName = $_SESSION["username"];
$userEmail = $_SESSION["email"];
$userIcon = $_SESSION["icon"];

$userId = "";
if ($_SESSION["user_id"]) {
    $userId = $_SESSION["user_id"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
    #style {
        color: <?=$_SESSION["likeStyle"][1]?>;
    }
    </style>
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
</head>

<body class="relative contents">
    <div class="index-container">
        <div class="nav-second" id="nav-second">
            <p id="close" class="close absolute">×</p>
            <!-- personal pageに遷移する -->
            <?php if ($userId) {?>
            <form action="./app/controller/DetailController.php" method="post">
                <input type="hidden" value="<?=$_SESSION["user_id"]?>" name="user_id">
                <?php if ($userIcon) {?>
                <button type="submit"><img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon"></button>
                <?php } else {?>
                <button type="submit"><img src="./assets/img/user-dummy.png" alt="" class="user-icon"></button>
                <?php }?>
            </form>
            <?php } else {?>
            <?php if ($userIcon) {?>
            <button type="submit"><img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon"></button>
            <?php } else {?>
            <button type="submit"><img src="./assets/img/user-dummy.png" alt="" class="user-icon"></button>
            <?php }?>

            <?php }?>
            <p class="username"><?php echo $userName ?></p>
            <p class="userEmail"><?php echo $userEmail ?></p>
            <?php if ($userId) {?>
            <form action="./session/view/profileEdit.php" method="post" class="form-edit">
                <input type="hidden" value="<?=$_SESSION["user_id"]?>" name="user_id">
                <button class="user-edit"><i class="fas fa-user-edit"></i></button>
            </form>
            <?php }?>


            <div class="buttons-container w100">
                <?php if ($userId) {?>
                <button class="like w100 flex">
                    <a href="" class="flex-left black gap8 w60">
                        <i class="far fa-thumbs-up"></i>
                        <p>Liked comments</p>
                    </a>
                </button>
                <button class="following w100 flex">
                    <a href="" class="flex-left black gap8 w60">
                        <i class="far fa-user"></i>
                        <p>Following</p>
                    </a>
                </button>
                <button class="followers w100 flex">
                    <a href="" class="flex-left black gap8 w60">
                        <i class="far fa-user"></i>
                        <p>Followers</p>
                    </a>
                </button>
                <button class="posts w100 flex">
                    <a href="./post.php" class="flex-left black gap8 w60">
                        <i class="far fa-edit"></i>
                        <p>Posts</p>
                    </a>
                </button>
                <?php }?>

                <?php if (!isset($_SESSION["user_id"])) {?>
                <button class="w100">
                    <a href="session/view/signUp.php" class="signup-icon"><i class="fas fa-user-plus"></i></a>
                    <p>Sign Up</p>
                </button>
                <?php } else {?>
                <button class="w100">
                    <form action="./session/app/controller/signoutController.php" method="post">
                        <input type="submit" value="Log out" name="logout" class="logout">
                    </form>
                </button>
                <?php }?>
            </div>



        </div>
        <main class="bg">

            <?php foreach ($postData as $post): ?>
            <div class="post-container" data-post-id="<?php echo $post["id"] ?>">
                <div class="left relative">
                    <form action="./app/controller/postDetailController.php" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>">
                        <button type="submit"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"></button>
                    </form>
                    <div class="post-comment-container border_none">
                        <div class="flex-left gap3">
                            <div class="icon-containerDetail">
                                <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                            </div>
                            <div class="textDetail-container">
                                <p class="bold"><?=$post["username"]?></p>
                                <p><?=$post["body"]?></p>

                            </div>
                        </div>

                        <div class="comment-section">
                            <div class="comment-container">
                                <i class="far fa-comment"></i>
                                <a class="comment"><?=$post["comments_count"]?></a>
                            </div>
                            <div class="like-container">
                                <!-- <form action="./app/controller/likePost.php" method="post"> -->
                                <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                <button type="submit" class=" btn-submit like-btn"
                                    data-post-id="<?php echo $post["id"] ?>">
                                    <i class="far fa-heart"></i>
                                    <div class="post" id="<?php echo $post["id"] ?>">
                                        <p class="likeCount"><?php echo $post["likes_count"] ?></p>
                                    </div>
                                </button>
                                <!--
                        </form> -->
                            </div>
                            <div class="dislike-container">
                                <button type="submit" class="black btn-submit dislike-btns"
                                    data-post-id="<?php echo $post["id"] ?>">
                                    <i class="far fa-thumbs-down"></i>
                                    <p>not interested</p>
                                </button>
                            </div>
                            <!-- <div class="delete-btn">
                            <form action="./app/controller/delete.php" method="post">
                                <i class="fas fa-trash-alt"></i>
                                <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $post["user_id"] ?>">
                                <button class="submit-btn" type="submit">Delete</button>
                            </form>
                        </div> -->


                        </div>
                    </div>
                    <div class="comment_container">
                        <?php if ($userIcon) {?>
                        <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon2">
                        <?php } else {?>
                        <img src="./assets/img/user-dummy.png" alt="" class="user-icon2">
                        <?php }?>
                        <form action="./app/controller/commentController.php" method="post" class="w100">
                            <input type="hidden" value="<?php echo $post["id"] ?>" name="post_id">
                            <input type="hidden" value="<?php echo $post["user_id"] ?>" name="user_id">
                            <input type="text" name="comment" class="comment-input" placeholder="Tweet your reply!">
                            <input type="submit" name="reply-btn" class="reply" value="reply">
                        </form>
                    </div>

                </div>
            </div>
            <?php endforeach;?>

        </main>
    </div>

    <script src="./js/main.js"></script>
    <script>
    const likeBtn = document.querySelectorAll(".like-btn");
    const count = document.querySelector(".likeCount");
    const forms = document.querySelectorAll(".dislike-btns");

    window.addEventListener("load", () => {
        dislikePost = JSON.parse(localStorage.getItem("post")) || []
    })

    // 興味ない投稿を非表示にする
    forms.forEach((form) => {
        dislikePost = JSON.parse(localStorage.getItem("post")) || []
        let checkId = form.dataset.postId;
        if (dislikePost.includes(checkId)) {
            form.parentElement.parentElement.parentElement.parentElement.style.display = "none";
        }

        form.addEventListener("click", (e) => {
            var parent = e.target.parentElement.parentElement.parentElement.parentElement.parentElement
                .parentElement;
            const id = parent.dataset.postId;
            if (form.dataset.postId == id) {
                parent.style.display = "none";
                dislikePost.push(id)
                localStorage.setItem("post", JSON.stringify(dislikePost))
            }
        })

    })


    likeBtn.forEach(btn => {
        btn.addEventListener("click", () => {
            let postId = btn.dataset.postId
            fetch("./app/api.php", {
                    // 第1引数に送り先
                    method: "POST", // メソッド指定
                    headers: {
                        "Content-Type": "application/json"
                    }, // jsonを指定
                    body: JSON.stringify(postId), // json形式に変換して添付
                })
                .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
                .then((res) => {
                    console.log(res); // やりたい処理
                    document.querySelectorAll(".post").forEach((post) => {
                        if (post.id == postId) {
                            post.querySelector(".likeCount").textContent = res[0][
                                "likes_count"
                            ];
                        }

                    })

                })
                .catch((error) => {
                    console.log(error); // エラー表示
                });
        })
    });
    </script>
</body>

</html>