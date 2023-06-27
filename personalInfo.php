<?php

session_start();

$path = "./images/";
$posts = $_SESSION["postData"];

$counts = $_SESSION["likesCount"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="personal-info-container">
        <div class="bg-img-container">
            <div class="icon2 relative">
                <img src="./assets/img/bg.png" alt="" class="bg-img">
                <div class="camera absolute">
                    <i class="far fa-plus-square camera-icon"></i>
                </div>
                <input type="file" name="icon">
                <div class="input-icon">
                    <div class="camera2 absolute">
                        <img src="./assets/img/user-dummy.png" class="user-icon3">
                    </div>
                    <input type="file" name="icon">
                </div>
            </div>
        </div>
        <div class="icon-container">
            <div class="notification">
                <a href="/"><i class="far fa-bell"></i></a>
            </div>
            <div class="email">
                <a href="/"><i class="far fa-envelope"></i></a>
            </div>
            <button class="follow-btn">
                <a href="">Following</a>
            </button>
        </div>
        <div class="info-detail">
            <p class="personal-info font_size2 bold">test user</p>
            <p class="personal-email">test@gmail.com</p>
            <p class="join_date"><i class="far fa-calendar-alt"> Joined December 2013 </i></p>
            <div class="following-num">
                <div class="follwing_number">
                    <p><span>1</span> Following</p>

                </div>
                <div class="follwer_number">
                    <p><span>145</span> Followers</p>
                </div>
            </div>
        </div>
        <div class="choosing-container">
            <a href="/">Tweets</a>
            <a href="/">Tweets & replies</a>
            <a href="/">Media</a>
            <a href="/">Likes</a>
        </div>

    </div>
    <div class="bg main">

        <?php foreach ($posts as $post): ?>
        <div class=" post-container border">
            <div class="left2 relative">
                <form action="./app/controller/postDetailController.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>">
                    <button type="submit"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"></button>
                </form>
                <div class="post-comment-container2 border_none">
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
                            <a class="comment">12</a>
                        </div>
                        <div class="like-container">
                            <!-- <form action="./app/controller/likePost.php" method="post"> -->
                            <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                            <button type="submit" class=" btn-submit like-btn" data-post-id="<?php echo $post["id"] ?>">
                                <i class="far fa-heart"></i>
                                <div class="post" id="<?php echo $post["id"] ?>">
                                    <p class="likeCount"><?php echo $post["likes_count"] ?></p>
                                </div>
                            </button>
                            <!--
                        </form> -->
                        </div>
                        <div class="dislike-container">
                            <form action="">
                                <button type="submit" class="black btn-submit">
                                    <i class="far fa-thumbs-down"></i>
                                    <p>not interested</p>
                                </button>
                            </form>
                        </div>
                        <div class="delete-btn">
                            <form action="./app/controller/delete.php" method="post">
                                <i class="fas fa-trash-alt"></i>
                                <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $post["user_id"] ?>">
                                <button class="submit-btn" type="submit">Delete</button>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <?php endforeach;?>
        <script>
        const likeBtn = document.querySelectorAll(".like-btn");
        const count = document.querySelector(".likeCount");

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