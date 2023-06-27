<?php
require_once dirname(__FILE__) . "/app/service/postServiceFn.php";
require_once dirname(__FILE__) . "/app/controller/controller.php";

$like = new postService();

$path = "./images/";
// $posts = $_SESSION["postData"];
$posts = ($_SESSION["post"]);
$comments = $_SESSION["post_comment"];
// print_r($comments);

// s

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

<body class="congtents">



    <div class=" post-container ">
        <div class="nav-second" id="nav-second">
            <p id="close" class="close absolute">×</p>
            <?php if ($userIcon) {?>
            <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon">
            <?php } else {?>
            <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
            <?php }?>
            <p class="username"><?php echo $userName ?></p>
            <p class="userEmail"><?php echo $userEmail ?></p>
            <button class="user-edit"><i class="fas fa-user-edit"></i></button>
            <div class="buttons-container w100">
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
        <main class="bg ">
            <div class=" post-container">
                <div class="left relative margin_b50">
                    <div class="container">
                        <div class="icon">
                            <img src="<?php echo $path . $posts["icon"] ?>" alt="" class="avatar">
                            <p><?=$posts["username"]?></p>
                        </div>
                        <div class="text">
                            <div class="title-container">
                                <h4><?=$posts["title"]?></h4>
                            </div>
                            <p><?=$posts["body"]?></p>
                            <div class="comment-section">
                                <div class="comment-container">
                                    <i class="far fa-comment"></i>
                                    <a class="comment">12</a>
                                </div>
                                <div class="like-container">
                                    <form action="./app/controller/likePost.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $posts["id"] ?>">
                                        <button type="submit" class=" btn-submit">
                                            <i class="far fa-heart"></i>
                                            <?php echo $like->getLikeCount($posts[0]) ?>
                                            <?php echo $like->likeCount ?>
                                        </button>

                                    </form>
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

            </div>

            <?php foreach ($comments as $comment) {?>
            <div class="post-comment-container">
                <div class="flex-left gap3">
                    <div class="icon-containerDetail">
                        <img src="./assets/img/user-dummy.png" alt="" class="dummy-detail">
                    </div>
                    <div class="textDetail-container">
                        <p class="bold">moeka</p>
                        <p><?=$comment["comment"]?></p>
                    </div>
                </div>

                <div class="comment-section">
                    <div class="comment-container">
                        <i class="far fa-comment"></i>
                        <a class="comment">12</a>
                    </div>
                    <div class="like-container">
                        <form action="./app/controller/likePost.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $posts["id"] ?>">
                            <button type="submit" class=" btn-submit">
                                <i class="far fa-heart"></i>
                                <?php echo $like->getLikeCount($posts[0]) ?>
                                <?php echo $like->likeCount ?>
                            </button>

                        </form>
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
            <?php }?>




        </main>

    </div>
    </div>

</body>

</html>