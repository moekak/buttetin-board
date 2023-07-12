<?php
require_once dirname(__FILE__) . "/app/service/postServiceFn.php";
require_once dirname(__FILE__) . "/app/controller/controller.php";

$like = new postService();

$path = "./images/";
$path2 = "./images2/";
// $posts = $_SESSION["postData"];
$posts = ($_SESSION["post"]);
$comments = $_SESSION["post_comment"];



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
                <p>Home</p>
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
                <p>Profile</p>
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
            <div class="tweet-btn">
                <a href="./index.php" class="black"><p class="black">←　Tweet</p></a>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div class="post-container" data-post-id="<?php echo $post['post_id'] ?>">
                    <div class="left relative">
                        <form action="./app/controller/postDetailController.php" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                            <button type="submit" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; z-index: 889;"></button>
                        </form>
                        <div class="post-comment-container border_none">
                            <div class="flex-left gap3">

                                <div class="icon-containerDetail">
                                    <?php if ($post["icon"]) { ?>
                                        <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                                    <?php } else { ?>
                                        <img src="./assets/img/user-dummy.png" alt="" class="avatar">
                                    <?php } ?>
                                </div>
                                <div class="textDetail-container">
                                    <p class="bold"><?php echo $post["name"] ?></p>
                                    <p class="tweet-body"><?= $post["body"] ?></p>
                                </div>
                            </div>
                            <div class="image-container">
                                <?php if ($post["image"]) { ?>
                                    <img src="<?php echo $path2 . $post["image"] ?>" alt="" class="your-img">
                                <?php } ?>
                            </div>

                            <div class="comment-section">
                                <div class="comment-container comment-btn">
                                    <form action="./app/controller/commentController.php" method="post" class="comment-form">
                                        <i class="far fa-comment"></i>
                                        <a class="comment"><?= $post["comments_count"] ?></a>
                                        <input type="hidden" value="<?= $post['post_id'] ?>" name="postID">
                                    </form>
                                </div>
                                <div class="like-container">
                                    <input type="hidden" name="id" value="<?php echo $post["post_id"] ?>">
                                    <button type="submit" class=" btn-submit like-btn" data-post-id="<?php echo $post["post_id"] ?>">
                                        <!-- <i class="far fa-heart"></i> -->
                                        <div class="post" id="<?php echo $post["post_id"] ?>">
                                            <i class="far fa-heart heart-one"></i>
                                            <div class="heart-second">
                                                <i class="fas fa-heart "></i>
                                            </div>

                                            <p class="likeCount"><?php echo $post["likes_count"] ?></p>

                                        </div>
                                    </button>
                                </div>
                                <div class="dislike-container">
                                    <button type="submit" class="black btn-submit dislike-btns" data-post-id="<?php echo $post["post_id"] ?>">
                                        <i class="far fa-thumbs-down"></i>
                                        <p>not interested</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top2 flex3">
                        <div class="home">
                              <?php if ($post['icon']) { ?>
                                    <img src="<?php echo $path . $post['icon'] ?>" alt="" class="user-icon">
                              <?php } else { ?>
                                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                              <?php } ?>
                        </div>

                        <form action="./app/controller/commentController.php" method="post" class="tweet-form">
                              <textarea type="text" name="comment" class="body-input2" placeholder="Tweet your reply!" rows="3"></textarea>
                              <div class="tweet-btn-container">
                                    <div class="icon" id="icon-upload2">
                                          <i class="far fa-image user"></i>
                                          <input type="file">
                                    </div>
                                    <input type="hidden" value='<?php echo $post['post_id'] ?>' name="id">
                                    <input type="hidden" value='<?php echo $post['user_id'] ?>' name="user_id">
                                    <button type="submit" class="tweet-btn2" name="tweet">Reply</button>
                              </div>

                        </form>
                  </div>
                </div>
            <?php endforeach; ?>

        </main>
    </div>
    <div class="modal-post absolute" id="js_modal_post">
        <div class="close-tweet">×</div>
        <div class="top">
            <div class="home">
                <?php if ($userId) { ?>
                    <?php if ($userIcon) { ?>
                        <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon">
                    <?php } else { ?>
                        <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                    <?php } ?>
                <?php } else { ?>
                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                <?php } ?>
            </div>

            <form action="./app/controller/controller.php" method="post" enctype="multipart/form-data" class="tweet-form">
                <textarea type="text" name="body" class="body-input2" placeholder="What is happening?!" rows="4"></textarea>
                <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img">
                <div class="tweet-btn-container">
                    <div class="icon" id="icon-upload2">
                        <i class="far fa-image user"></i>
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="tweet-btn2">Tweet</button>
                </div>

            </form>
        </div>


    </div>
    <!-- logout modal -->
    <div class="logout-modal">
        <div class="twitter-container">
            <i class="fab fa-twitter"></i>
        </div>
        <h3>Log out of Twitter?</h3>
        <p class="confirm">You can always log back in at any time. If you just want to switch accounts, you can do that by adding and existing accounts.</p>

        <button class="logOut-confirm">Log out</button>
        <button class="logOut-cancel">Cancel</button>
    </div>







    <script>
        const likeBtn = document.querySelector(".like-btn");
        likeBtn.addEventListener("click", () => {
            let postId = likeBtn.dataset.postId
            fetch("./app/api1.php", {
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
                    // document.querySelectorAll(".post").forEach((post) => {
                    //     if (post.id == postId) {
                    //         post.querySelector(".likeCount").textContent = res[0][
                    //             "likes_count"
                    //         ];
                    //     }

                    // })

                })
                .catch((error) => {
                    console.log(error); // エラー表示
                });
        })
    </script>
</body>

</html>