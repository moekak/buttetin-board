<?php

session_start();

$path = "./images/";
$posts = $_SESSION["postData"];
// print_r($_SESSION["userData"]);

$userName = $_SESSION["name"];
$userEmail = $_SESSION["phone"];
$userIcon =  $_SESSION["icon"];
$date = $_SESSION["created_at"];
$introduction = $_SESSION["introduction"];
$country = '';
if ($_SESSION["country"]) {
    $country = $_SESSION["country"];
}

$web = $_SESSION["web_site"];
$dateTime = new DateTime($date);
$month = $dateTime->format("F");
$year = $dateTime->format("Y");

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
    <div class="bg-white"></div>
    <div class="bg-gray"></div>
    <div class="index-container">
        <div class="nav-second" id="nav-second">
            <i class="fab fa-twitter"></i>
            <div class="social-icon-container hover1">
                <i class="fas fa-home"></i>
                <a href="./index.php">
                    <p>Home</p>
                </a>
            </div>
            <div class="social-icon-container hover2">
                <i class="fas fa-search"></i>
                <p>Explore</p>
            </div>
            <div class="social-icon-container hover3">
                <i class="far fa-bell"></i>
                <p>Notifications</p>
            </div>
            <div class="social-icon-container hover4">
                <i class="far fa-envelope"></i>
                <p>Messages</p>
            </div>
            <div class="social-icon-container hover9">
                <i class="far fa-user"></i>
                <a href="./personalInfo.php">
                    <p>Profile</p>
                </a>
            </div>
            <div class="social-icon-container hover10">
                <i class="far fa-circle"></i>
                <p>More</p>
            </div>
            <div class="social-icon-container btn-bg">
                <button class="tweet-btn">Tweet</button>
            </div>
            <div class="logOut" id="js_logout">
                <button class="logOut-btn">Log out</button>

            </div>



        </div>
        <main class="bg">
            <div class="bg-img-container">
                <div class="icon2 relative">
                    <img src="./assets/img/bg.png" alt="" class="bg-img">
                    <div class="camera absolute">
                        <i class="far fa-plus-square camera-icon"></i>
                    </div>
                    <input type="file" name="icon">
                    <div class="input-icon">
                        <div class="camera2 absolute">
                            <?php if ($userIcon) { ?>
                                <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon3">
                            <?php } else { ?>
                                <img src="./assets/img/user-dummy.png" class="user-icon3">
                            <?php } ?>

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
                    <a href="">Edit profile</a>
                </button>
            </div>
            <div class="info-detail">
                <p class="personal-info font_size2 bold"><?= $userName ?></p>
                <p class="personal-email"><?= $userEmail ?></p>
                <p class="introdution"><?= $introduction ?></p>
                <p class="join_date"><i class="far fa-calendar-alt"> Joined <?= $month ?> <?= $year ?> </i></p>
                <div class="detail-info">
                    <p class="place"><i class="fas fa-map-marker-alt"> </i> <?= $country ?></p>
                    <a href="<?= $web ?>" class="web" target="_blank"><i class="fas fa-link"></i> <?= $web ?></a>
                </div>

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

        </main>

    </div>



    <div class="bg main">

        <?php foreach ($posts as $post) : ?>
            <div class=" post-container border">
                <div class="left2 relative">
                    <form action="./app/controller/postDetailController.php" method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>">
                        <button type="submit" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"></button>
                    </form>
                    <div class="post-comment-container2 border_none">
                        <div class="flex-left gap3">
                            <div class="icon-containerDetail">
                                <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                            </div>
                            <div class="textDetail-container">
                                <p class="bold"><?= $post["username"] ?></p>
                                <p><?= $post["body"] ?></p>

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
        <?php endforeach; ?>
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