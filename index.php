<?php
require_once dirname(__FILE__) . "/app/controller/controller.php";
require_once dirname(__FILE__) . "/app/service/postServiceFn.php";

$path = "./images/";
$path2 = "./images2/";

// echo $_SESSION["user_id"];
$postData = $_SESSION["postData"];

// $counts = $_SESSION["likesCount"];
// $userName = $_SESSION["username"];
// $userEmail = $_SESSION["email"];
$userIcon = '';
if (isset($_SESSION['icon'])) {
    $userIcon = $_SESSION['icon'];
}

$userId = "";
if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
}

// echo $_SESSION["name"]

$postDetails = '';
// if ($_SESSION['post']) {
//     $postDetails = $_SESSION['post'];
// }
// print_r($_SESSION['post'])

// print_r($postData) ;

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
    <div class="bg-white"></div>
    <div class="bg-gray"></div>
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
    <article class="bg2">
        <div class="top fixed">
            <h3>Home</h3>
            <div class="select-btn-container">
                <div class="forYou ">
                    <button class="choose-btn">For you</button>
                </div>
                <div class="following">
                    <button class="choose-btn">Following</button>
                </div>
            </div>
        </div>
        <div class="post-container">
            <div class="top">
                <div class="home">
                    <?php if ($userId) {?>
                    <?php if ($userIcon) {?>
                    <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon">
                    <?php } else {?>
                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                    <?php }?>
                    <?php } else {?>
                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                    <?php }?>
                </div>

                <form action="./app/controller/controller.php" method="post" enctype="multipart/form-data">
                    <textarea type="text" name="body" class="body-input" placeholder="What is happening?!"
                        rows="3"></textarea>
                    <img id="displayImage" src="#" alt="your image" style="display:none;" class="your-img">
                    <div class="tweet-btn-container">
                        <div class="icon" id="icon-upload">
                            <i class="far fa-image user"></i>
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="tweet-btn2">Tweet</button>
                    </div>

                </form>
            </div>

        </div>

        <?php foreach ($postData as $post): ?>
        <div class="post-container" data-post-id="<?php echo $post['post_id'] ?>">
            <div class="left relative">
                <form action="./app/controller/postDetailController.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                    <button type="submit"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; z-index: 889;"></button>
                </form>
                <div class="post-comment-container border_none">
                    <div class="flex-left gap3">

                        <div class="icon-containerDetail">
                            <form action="./app/controller/userDetailController.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $post["user_id"] ?>">
                                <button type="submit" name="submit">
                                    <?php if ($post["icon"]) {?>
                                        <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                                    <?php } else {?>
                                        <img src="./assets/img/user-dummy.png" alt="" class="avatar">
                                    <?php }?>
                                </button>
                            </form>
                        </div>
                        <div class="textDetail-container">
                            <p class="bold"><?php echo $post["name"] ?></p>
                            <p class="tweet-body"><?=$post["body"]?></p>
                        </div>
                    </div>
                    <div class="image-container">
                        <?php if ($post["image"]) {?>
                        <img src="<?php echo $path2 . $post["image"] ?>" alt="" class="your-img">
                        <?php }?>
                    </div>

                    <div class="comment-section">
                        <div class="comment-container comment-btn">
                            <form action="./app/controller/commentController.php" method="post" class="comment-form">
                                <i class="far fa-comment"></i>
                                <a class="comment"><?=$post["comments_count"]?></a>
                                <input type="hidden" value="<?=$post['post_id']?>" name="postID">
                            </form>
                        </div>
                        <div class="like-container">
                            <input type="hidden" name="id" value="<?php echo $post["post_id"] ?>">
                            <button type="submit" class=" btn-submit like-btn"
                                data-post-id="<?php echo $post["post_id"] ?>">
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
                            <button type="submit" class="black btn-submit dislike-btns"
                                data-post-id="<?php echo $post["post_id"] ?>">
                                <i class="far fa-thumbs-down"></i>
                                <p>not interested</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </article>

    <div class="modal-post absolute" id="js_modal_post">
        <div class="close-tweet">×</div>
        <div class="top">
            <div class="home">
                <?php if ($userId) {?>
                <?php if ($userIcon) {?>
                <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon">
                <?php } else {?>
                <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                <?php }?>
                <?php } else {?>
                <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                <?php }?>
            </div>

            <form action="./app/controller/controller.php" method="post" enctype="multipart/form-data"
                class="tweet-form">
                <textarea type="text" name="body" class="body-input2" placeholder="What is happening?!"
                    rows="4"></textarea>
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
        <p class="confirm">You can always log back in at any time. If you just want to switch accounts, you can do that
            by adding and existing accounts.</p>

        <button class="logOut-confirm">Log out</button>
        <button class="logOut-cancel">Cancel</button>
    </div>



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

    const heart = document.querySelector('.fa-heart')
    console.log(heart);
    likeBtn.forEach(btn => {
        btn.addEventListener("click", () => {
            let postId = btn.dataset.postId
            console.log(postId);
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
                            console.log(post.querySelector('.likeCount').textContent);
                            if (post.querySelector('.likeCount').textContent < res) {
                                post.querySelector('.heart-one').style.display = 'none'
                                post.querySelector('.heart-second').style.display = 'block'
                                post.querySelector('.likeCount').style.color = 'red'
                            } else {
                                post.querySelector('.heart-one').style.display = 'block'
                                post.querySelector('.heart-second').style.display = 'none'
                                post.querySelector('.likeCount').style.color =
                                    'rgba(0, 0, 0, 0.616)'
                            }
                            post.querySelector(".likeCount").textContent = res;


                        }

                    })

                })
                .catch((error) => {
                    console.log(error); // エラー表示
                });
        })
    });


    const btns = document.querySelectorAll(".choose-btn");

    var activeButton = null;
    btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            if (activeButton) {
                activeButton.style.borderBottom = "";
            }
            var button = e.target;
            button.style.borderBottom = "3px solid rgba(29,161, 242)"

            activeButton = button;
        })
    })

    // ユーザーが選択した画像をブラウザ上に表示させる
    const upload = document.getElementById("icon-upload");

    upload.addEventListener("change", (e) => {
        // ユーザーのコンピュータ上のファイル（通常はユーザーがフォームを通じて選択したもの）を非同期に読み取る
        var reader = new FileReader();

        // FileReaderオブジェクトがファイルの読み込みを完了したときに発火する
        reader.onload = (e) => {
            dispayImage = document.getElementById("displayImage");
            // データURLを返す（e.target.result）
            console.log(e.target.result);
            dispayImage.src = e.target.result;
            dispayImage.style.display = "block";


        }
        // イベントオブジェクト e の target プロパティ（この場合、ファイルを選択する <input> 要素）の files プロパティを通じて選択されたファイルのリストにアクセスし、その中の最初のファイルを取り出している(e.target.files[0])
        reader.readAsDataURL(e.target.files[0]);
    })
    // ユーザーが選択した画像をブラウザ上に表示させる
    const upload2 = document.getElementById("icon-upload2");

    upload2.addEventListener("change", (e) => {
        // ユーザーのコンピュータ上のファイル（通常はユーザーがフォームを通じて選択したもの）を非同期に読み取る
        var reader = new FileReader();

        // FileReaderオブジェクトがファイルの読み込みを完了したときに発火する
        reader.onload = (e) => {
            dispayImage2 = document.getElementById("displayImage2");
            // データURLを返す（e.target.result）
            console.log(e.target.result);
            dispayImage2.src = e.target.result;
            dispayImage2.style.display = "block";


        }
        // イベントオブジェクト e の target プロパティ（この場合、ファイルを選択する <input> 要素）の files プロパティを通じて選択されたファイルのリストにアクセスし、その中の最初のファイルを取り出している(e.target.files[0])
        reader.readAsDataURL(e.target.files[0]);
    })

    // logout
    const logoutBtn = document.getElementById("js_logout")
    const gray = document.querySelector('.bg-gray')
    const white = document.querySelector('.bg-white')
    const contents = document.querySelector('.contents')
    const confirmBtn = document.querySelector(".logOut-confirm")
    const cancelBtn = document.querySelector(".logOut-cancel")
    const modal = document.querySelector('.logout-modal')
    console.log(confirmBtn);

    logoutBtn.addEventListener("click", () => {
        gray.style.display = "block"
        white.style.display = "block";
        contents.style.overflow = "hidden"
        modal.style.display = 'block'

    })
    cancelBtn.addEventListener('click', () => {
        gray.style.display = "none"
        white.style.display = "none";
        contents.style.overflow = "auto"
        modal.style.display = 'none'
    })
    confirmBtn.addEventListener("click", () => {
        fetch("./session/app/logoutApi.php", {

                // 第1引数に送り先
                method: "POST", // メソッド指定
                headers: {
                    "Content-Type": "application/json"
                }, // jsonを指定

                body: JSON.stringify("logout"), // json形式に変換して添付
            })
            .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
            .then((res) => {
                console.log(res); // やりたい処理
                if (res == 'success2') {
                    window.location.replace("./index2.php")
                }
            })
            .catch((error) => {
                console.log(error);

            });
    })

    // modal post
    const modalPost = document.getElementById('js_modal_post')
    const tweetBtn = document.querySelector('.btn-bg')
    const closeTweet = document.querySelector('.close-tweet')


    tweetBtn.addEventListener('click', () => {
        modalPost.style.display = 'block';
        gray.style.display = 'block';
    })
    closeTweet.addEventListener('click', () => {
        gray.style.display = 'none';
        modalPost.style.display = 'none';
    })


    // コメントの処理
    const commentBtn = document.querySelectorAll('.comment-btn')

    commentBtn.forEach((btn) => {
        btn.addEventListener('click', () => {
            btn.querySelector('.comment-form').submit();
            bg.style.display = 'block'

        })

    })

    // const formBtn = document.querySelectorAll('.post-comment-container');
    // const aaa = document.querySelector('.detail-form')
    // console.log(aaa);
    // formBtn.forEach((btn) => {
    //     btn.addEventListener('click', () => {

    //         btn.querySelector('.detail-form').submit();
    //     })
    // })
    </script>
</body>

</html>