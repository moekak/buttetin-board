<?php
    /** @var $pdo \PDO */
    require_once "DB.php";


    $statement = $pdo->prepare("SELECT * FROM `board-table`");
    $statement-> execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    // print_r($posts)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="search-container relative">
            <input type="search" class="search" placeholder="Search">
            <i class="fas fa-search absolute"></i>
        </div>
        <div class="post-btn">
            <i class="fas fa-pen"></i>
            <a href="post.php" class="post">POST</a>
        </div>
    </nav>
    <main class="bg">
        <p ><span class="dott">●</span> Today</p>
        <?php foreach ($posts as $post) :?>
            <div class=" post-container">
                <div class="left">
                    <div class="container">
                        <div class="icon">
                            <img src="https://i.pravatar.cc/90" alt="" class="avatar">
                            <p>Andrew</p>
                        </div>
                        <div class="text">
                            <h4><?=$post["title"] ?></h4>
                            <p><?=$post["body"] ?></p>
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
                                        <input type="hidden" name="id" value="<?php echo $post["id"]?>">
                                        <button class="submit-btn" type="submit">Delete</button>
                                </form>
                                </a>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ;?>
        <!-- <div class="today">
            <p><span class="dott">●</span> Yesterday</p>
            <div class="post-container">
                <div class="left">
                    <div class="container">
                        <div class="icon">
                            <img src="https://i.pravatar.cc/90" alt="" class="avatar">
                            <p>Andrew</p>
                        </div>
                        <div class="text">
                            <h4>Free Beauty Samples What They Are And How To Find Them</h4>
                            <p>When television was young, there was a hugely popular show based on the still popular
                                fictional character of...</p>

                        </div>
                    </div>
                    <div class="comment-section">
                        <div class="comment-container">
                            <i class="far fa-comment"></i>
                            <a class="comment">12</a>
                        </div>
                        <div class="like-container">
                            <i class="fas fa-heart"></i>
                            <a class="like">Liked</a>
                        </div>
                        
                    </div>
                </div>
                <div class="right">
                    <img src="./img/example.jpg" alt="" class="main-img" width="1600" height="800">

                </div>

            </div>
        </div>
        <div class="today">
            <p><span class="dott">●</span> Yesterday</p>
            <div class="post-container">
                <div class="left">
                    <div class="container">
                        <div class="icon">
                            <img src="https://i.pravatar.cc/90" alt="" class="avatar">
                            <p>Andrew</p>
                        </div>
                        <div class="text">
                            <h4>Free Beauty Samples What They Are And How To Find Them</h4>
                            <p>When television was young, there was a hugely popular show based on the still popular
                                fictional character of...</p>

                        </div>
                    </div>
                    <div class="comment-section">
                        <div class="comment-container">
                            <i class="far fa-comment"></i>
                            <a class="comment">12</a>
                        </div>
                        <div class="like-container">
                            <i class="fas fa-heart"></i>
                            <a class="like">Liked</a>
                        </div>
                        
                    </div>
                </div>
                <div class="right">
                    <img src="./img/example.jpg" alt="" class="main-img" width="1600" height="800">

                </div>

            </div>
        </div> -->
    </main>
</body>

</html>