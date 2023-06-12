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



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
</head>

<body class="relative">
    <div id="cover"></div>
    <nav>
        <div class="left-nav">
            <?php if (isset($_SESSION["user_id"])) {?>
            <div class="bars" id="bar">
                <i class="fas fa-bars"></i>
            </div>
            <?php }?>

            <p>BLOG</p>
            <!-- <div class="search-container relative">
                <input type="search" class="search" placeholder="Search...">
                <i class="fas fa-search absolute"></i>
            </div> -->
        </div>
        <div class="right-nav">
            <?php if (!isset($_SESSION["user_id"])) {?>
            <a href="session/view/signUp.php" class="signup-icon"><i class="fas fa-user-plus"></i></a>
            <?php } else {?>
            <i class="fas fa-bell"></i>
            <div class="button">
                <a href="./post.php" class="post">
                    <i class="far fa-edit"></i>

                </a>
            </div>

            <form action="./session/app/controller/signoutController.php" method="post">
                <input type="submit" value="Log out" name="logout" class="logout">
            </form>
            <?php }?>
        </div>
    </nav>
    <div class="nav-second" id="nav-second">
        <p id="close" class="close absolute">×</p>
        <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon">
        <p class="username"><?php echo $userName ?></p>
        <p class="userEmail"><?php echo $userEmail ?></p>
        <button class="user-edit"><i class="fas fa-user-edit"></i></button>
        <div class="buttons-container w100">
            <button class="like w100">
                <a href="" class="flex white gap5 center">
                    <p>Liked comments</p>
                </a>
            </button>
            <button class="following w100">
                <a href="" class="flex white gap5">
                    <p>Following</p>
                </a>
            </button>
            <button class="followers w100">
                <a href="" class="flex white gap5">
                    <p>Followers</p>
                </a>
            </button>
            <button class="posts w100">
                <a href="" class="flex white gap5">
                    <p>Posts</p>
                </a>
            </button>
        </div>



    </div>
    <main class="bg">
        <p><span class="dott">●</span> Today</p>
        <?php foreach ($postData as $post): ?>
        <div class=" post-container">
            <p><?php echo $post["id"]?></p>

            <div class="left relative">
                <form action="./app/controller/postDetailController.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post["id"] ?>" >
                    <button type="submit" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"></button>
                </form>
                <div class="container">
                    <div class="icon">
                        <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                        <p><?=$post["username"]?></p>
                    </div>
                    <div class="text">
                        <h4><?=$post["title"]?></h4>
                        <p><?=$post["body"]?></p>
                        <div class="comment-section">
                            <div class="comment-container">
                                <i class="far fa-comment"></i>
                                <a class="comment">12</a>
                            </div>
                            <div class="like-container">
                                <form action="./app/controller/likePost.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                    <button type="submit" class="white btn-submit">
                                        <i class="fas fa-heart"></i>
                                        <?php echo $like->getLikeCount($post["id"]) ?>
                                        <?php echo $like->likeCount ?>
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
        </div>
        <div class="comment_container">
            <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon2">
            <form action="./app/controller/commentController.php" method="post" class="w100">
                <input type="hidden" value="<?php echo $post["id"] ?>" name="post_id">
                <input type="hidden" value="<?php echo $post["user_id"] ?>" name="user_id">
                <input type="text" name="comment" class="comment-input" placeholder="Tweet your reply!">
                <input type="submit" name="reply-btn" class="reply" value="reply">
            </form>
        </div>
        <?php endforeach;?>

    </main>
    <script src="./js/main.js"></script>
</body>

</html>