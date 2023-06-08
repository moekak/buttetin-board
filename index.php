<?php
require_once(dirname(__FILE__) . "/app/controller/controller.php");

$path = "./images/"



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

<body>
    <nav>
        <a href="session/view/signUp.php">signup</a>
        <div class="search-container relative">
            <input type="search" class="search" placeholder="Search">
            <i class="fas fa-search absolute"></i>
        </div>
        <div class="post-btn">
            <form action="post.php" method="post">
                <i class="fas fa-pen"></i>
                <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
               <button class="submit-btn" type="submit">Post</button>
            </form>
            
     
        </div>
    </nav>
    <main class="bg">
        <p><span class="dott">●</span> Today</p>
        <?php foreach ($postData as $post) : ?>
            <div class=" post-container">
                <div class="left">
                    <div class="container">
                        <div class="icon">
                            <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                            <p><?= $post["username"]?></p>
                        </div>
                        <div class="text">
                            <h4><?= $post["title"] ?></h4>
                            <p><?= $post["body"] ?></p>
                            <div class="comment-section">
                                <div class="comment-container">
                                    <i class="far fa-comment"></i>
                                    <a class="comment">12</a>
                                </div>
                                <div class="like-container">
                                    <i class="fas fa-heart"></i>
                                    <a class="like">Liked</a>
                                </div>
                                <div class="delete-btn">
                                    <form action="delete.php" method="post">
                                        <i class="fas fa-trash-alt"></i>
                                        <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                        <button class="submit-btn" type="submit">Delete</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </main>
</body>

</html>