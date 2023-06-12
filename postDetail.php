<?php
// require_once dirname(__FILE__) . "/app/controller/controller.php";

session_start();

$path = "./images/";
// $posts = $_SESSION["postData"];
$posts = ($_SESSION["post"]);

echo $posts["icon"];


// s

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>
<body>
<main class="bg">


<div class=" post-container">
            <p><?php //echo $post["id"] ?></p>

            <div class="left relative">
                <!-- <form action="./app/controller/postDetailController.php" method="post">
                    <input type="hidden" name="post_id" value="<?php //echo $post["id"] ?>" >
                    <button type="submit" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"></button>
                </form> -->
                <div class="container">
                    <div class="icon">
                        <img src="<?php echo $path . $posts["icon"] ?>" alt="" class="avatar">
                        <!-- <p><?=$posts["title"]?></p> -->
                    </div>
                    <div class="text">
                        <h4><?=$posts["title"]?></h4>
                        <p><?=$posts["body"]?></p>
                        <div class="comment-section">
                            <div class="comment-container">
                                <i class="far fa-comment"></i>
                                <a class="comment">12</a>
                            </div>
                            <div class="like-container">
                                <form action="./app/controller/likePost.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $posts[0]["id"] ?>">
                                    <button type="submit" class="white btn-submit">
                                        <i class="fas fa-heart"></i>
                                        <!-- <?php echo $like->getLikeCount($post["id"]) ?>
                                        <?php echo $like->likeCount ?> -->
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
            <form action="./app/controller/commentController.php" method="post" class="w100" >
                <input type="hidden" value="<?php echo $post["id"] ?>" name="post_id">
                <input type="hidden" value="<?php echo $post["user_id"] ?>" name="user_id">
                <input type="text" name="comment" class="comment-input" placeholder="Tweet your reply!">
                <input type="submit" name="reply-btn" class="reply" value="reply">
            </form>
        </div>


    </main>
</body>
</html>