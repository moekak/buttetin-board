<?php

session_start();

$userDetail = "";
if(isset($_SESSION["userDetail"])){
    $userDetail = $_SESSION["userDetail"];
}

echo $userDetail;

$path = "./images/";
$path2 = "./images3/";
$posts = "";
if (isset($_SESSION["postData"])) {
    $posts = $_SESSION["postData"];
}
// print_r($_SESSION["userData"]);

$userName = "";
if (isset($_SESSION["name"])) {
    $userName = $_SESSION["name"];
}
$userEmail = "";
if (isset($_SESSION["phone"])) {
    $userEmail = $_SESSION["phone"];
}
$userBirthday = "";
if (isset($_SESSION["birthday"])) {
    $userBirthday = $_SESSION["birthday"];
}

$userIcon = "";
if (isset($_SESSION["icon"])) {
    $userIcon = $_SESSION["icon"];
}
echo $userIcon;
$login_name = "";
if (isset($_SESSION["login_name"])) {
    $login_name = $_SESSION["login_name"];
}
$date = "";
if (isset($_SESSION["created_at"])) {
    $date = $_SESSION["created_at"];
}
$introduction = "";
if (isset($_SESSION["introduction"])) {
    $introduction = $_SESSION["introduction"];
}
$bg_img = "";
if (isset($_SESSION["bg-img"])) {
    $bg_img = $_SESSION["bg-img"];
}
$country = '';
if (isset($_SESSION["country"])) {
    $country = $_SESSION["country"];
}

$web = "";
if (isset($_SESSION["web_site"])) {
    $web = $_SESSION["web_site"];
}
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




        <main class="bg">
            <div class="bg-img-container">
                <div class="icon2 relative">
                    <div class="bg-container-edit">
                        <?php if ($bg_img) {?>
                        <img src="<?php echo $path2 . $bg_img ?>" alt="" class="bg-img">
                        <?php } else {?>
                        <div class="camera absolute">
                            <img src="./assets/img/bg.png" alt="" class="bg-img">
                            <i class="far fa-plus-square camera-icon"></i>
                        </div>
                        <?php }?>
                    </div>
                    <input type="file" name="icon">
                    <div class="input-icon">
                        <div class="camera2 absolute">
                            <?php if ($userIcon) {?>
                                <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon3">
                            <?php } else {?>
                                <img src="./assets/img/user-dummy.png" class="user-icon3">
                            <?php }?>

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
                    <div id="edit-btn">Edit profile</div>
                </button>
            </div>
            <div class="info-detail">
                <p class="personal-info font_size2 bold"><?=$userName?></p>
                <p class="personal-email"><?=$login_name?></p>
                <p class="introdution"><?=$introduction?></p>
                <p class="join_date"><i class="far fa-calendar-alt"> Joined <?=$month?> <?=$year?> </i></p>
                <div class="detail-info">
                    <p class="place"><i class="fas fa-map-marker-alt"> </i> <?=$country?></p>
                    <a href="<?=$web?>" class="web" target="_blank"><i class="fas fa-link"></i> <?=$web?></a>
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



    <!-- <div class="bg main">

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

                            <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                            <button type="submit" class=" btn-submit like-btn" data-post-id="<?php echo $post["id"] ?>">
                                <i class="far fa-heart"></i>
                                <div class="post" id="<?php echo $post["id"] ?>">
                                    <p class="likeCount"><?php echo $post["likes_count"] ?></p>
                                </div>
                            </button>

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
    </div> -->
    <!-- edit profile modalページ -->
    <div class="modal-edit-profile">
        <div class="edit-profile-container">
            <!-- first page -->
            <div class="edit-first">
                <h1>Pick a Profile picture</h1>
                <p>Have a favorite selfie? Upload it now.</p>
                <div class="relative">
                    <form action="./session/app/controller/SignupController.php" method="post"
                        enctype="multipart/form-data" id="icon-form">
                        <div class="icon" id="icon-upload">
                            <?php if ($userIcon) {?>
                            <img src="<?php echo $path . $userIcon ?>" alt="" class="user-dummy">
                            <?php } else {?>
                            <img src="./assets/img/user-dummy.png" alt="" class="user-dummy">
                            <?php }?>

                            <input type="file" name="icon" id="icon-btn">
                            <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img2">
                        </div>
                        <div class="next-btn3 skip-first">Skip it for now</div>
                        <button class="next-btn3 edit-next" type="submit" name="submit" id="skip1">Next</button>
                    </form>
                </div>
            </div>
            <!-- second page -->
            <div class="edit-second">
                <h1>Pick a header</h1>
                <p>People who visit your profile will see it. Show your style.</p>
                <div class="relative">
                    <form action="./app/controller/editController.php" method="post" enctype="multipart/form-data"
                        id="bg-upload">
                        <div class="gray">
                            <div class="icon">
                                <img src="./assets/img/camera.png" alt="" class="bg-pic">
                                <input type="file" name="bg-img" id="icon-btn">
                                <img id="displayImage2" src="#" alt="your image" style="display:none;"
                                    class="your-img2">
                            </div>
                        </div>
                        <div class="edit-icon-container">
                            <?php if ($userIcon) {?>
                            <img src="<?php echo $path . $userIcon ?>" alt="" class="user-dummy2">
                            <?php } else {?>
                            <img src="./assets/img/user-dummy.png" alt="" class="user-dummy2">
                            <?php }?>
                            <h3 class="edit-name"><?=$userName?></h3>
                        </div>

                        <input type="hidden" value="<?php echo $_SESSION["user_id"] ?>" name="user_id">
                        <div class="next-btn3 skip-second">Skip it for now</div>
                        <button class="next-btn3" type="submit" name="submit" id="skip2">Next</button>
                    </form>
                </div>
            </div>
            <!-- third page -->
            <div class="edit-third">
                <h1>Describe yourself</h1>
                <p>What makes you special? Don't think too hard, just jave fun with it.</p>
                <form action="./app/controller/editController.php" method="post" class="relative">
                    <input type="text" name="introduction" placeholder="Your bio" maxlength="160" class="input-bio">
                    <div class="count-bio" id="count-bio">0/160</div>
                    <input type="hidden" value="<?php echo $_SESSION["user_id"] ?>" name="user_id">
                    <div class="padding30"></div>
                    <div class="next-btn3 skip-third">Skip it for now</div>
                    <button class="next-btn3" type="submit" name="submitBio" id="skip3" value="submit">Next</button>

                </form>
            </div>
            <!-- forth page -->
            <div class="edit-forth">
                <h1>Where do you live</h1>
                <p>Find accounts in the same location as you.</p>
                <form action="./app/controller/editController.php" method="post" class="relative">
                    <input type="text" name="country" placeholder="Location" maxlength="30" class="input-location">
                    <div class="count-bio" id="count-location">0/30</div>
                    <input type="hidden" value="<?php echo $_SESSION["user_id"] ?>" name="user_id">
                    <div class="padding30"></div>
                    <div class="next-btn3 skip-forth">Skip it for now</div>
                    <button class="next-btn3" type="submit" name="submitLocation" id="skip4"
                        value="submit">Next</button>

                </form>
            </div>
        </div>

    </div>
    <div class="modal-edit-profile2">
        <div class="edit-profile-container2">
            <div class="edit-profile2">
                <div class="edit-title">
                    <p class="bold">×</p>
                    <p class="bold">Edit profile</p>
                </div>
                <form action="./app/controller/editController.php" method="post" enctype="multipart/form-data"
                    class="edit-profile-form">
                    <div class="gray2 relative">
                        <div class="icon">
                            <img src="./assets/img/camera.png" alt="" class="bg-pic">
                            <input type="file" name="bg-img" id="icon-btn">
                            <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img2">
                        </div>
                    </div>
                    <div class="edit-icon-container2">
                        <div class="icon">
                            <?php if ($userIcon) {?>
                                <img src="<?php echo $path . $userIcon ?>" alt="" class="user-dummy3">
                            <?php } else {?>
                                <img src="./assets/img/user-dummy.png" alt="" class="user-dummy3">
                            <?php }?>
                            <input type="file" name="icon" id="icon-btn">
                            <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img2">
                        </div>

                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]?>">
                    <div class="input-name-edit">
                        <input type="text" name="username" placeholder="Name" class="name-edit">
                    </div>
                    <div class="input-name-edit">
                        <textarea type="text" name="introduction" placeholder="Bio" class="bio-edit"
                            rows="3"></textarea>
                    </div>
                    <div class="input-name-edit">
                        <input type="text" name="country" placeholder="Location" class="location-edit">
                    </div>
                    <div class="input-name-edit">
                        <input type="text" name="web_site" placeholder="Web" class="website-edit">
                    </div>
                    <!-- <input type="hidden" value="<?php echo $_SESSION["user_id"] ?>" name="user_id"> -->
                    <!-- <div class="next-btn3 skip-second">Skip it for now</div>
                    <button class="next-btn3" type="submit" name="submit" id="skip2">Next</button> -->
                    <div class="birthday-edit">
                        <div class="birthday-wrapper">
                            <p class="birthDate">Birth date</p>
                            <p class="birthday-confirm"><?php echo $userBirthday ?></p>  
                        </div>
                        <button type="submit" value="save" name="save" class="save-edit">save</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    // document.addEventListener('visibilitychange', function() {
    //     if (document.hidden) {
    //         localStorage.clear();
    //     }
    // });

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

    const editBtn = document.getElementById("edit-btn")
    const gray = document.querySelector(".bg-gray")
    const modalEdit = document.querySelector(".modal-edit-profile2")
    const skip1 = document.getElementById("skip1")

    document.querySelector(".skip-first").addEventListener("click", () => {
        document.querySelector(".edit-second").style.display = "block"
        document.querySelector(".edit-first").style.display = "none"
    })
    editBtn.addEventListener("click", () => {
        gray.style.display = "block"
        modalEdit.style.display = "flex"
        // document.querySelector(".edit-first").style.display = "block"
    })


    // first step (uploading icon)

    const upload = document.getElementById("icon-upload");
    const btn1 = document.getElementById("skip1")

    upload.addEventListener("change", (e) => {
        document.querySelector(".skip-first").style.display = "none";
        btn1.style.display = "block"
        btn1.style.background = "black"
        btn1.innerHTML = "Next"

        var reader = new FileReader();

        reader.onload = (e) => {
            const displayImages = document.querySelectorAll(".user-dummy")
            displayImages.forEach((displayImage) => {
                displayImage.src = e.target.result;
            })
            // displayImage.src = e.target.result;
            // displayImage.style.display = "block"
            1
        }

        reader.readAsDataURL(e.target.files[0])

        if (btn1.innerHTML = "Next") {
            btn1.addEventListener("click", () => {
                localStorage.setItem("step1", "done")
            })

        }
        // if (btn1.innerHTML = "Skip it for now") {
        //     console.log("skip");
        //     document.getElementById("icon-form").addEventListener("submit", e => {
        //         e.preventDefault()
        //     })
        //     btn1.addEventListener("click", () => {
        //         document.querySelector(".edit-first").style.display = "none"
        //         document.querySelector(".edit-second").style.display = "block"

        //     })
        // }

    })


    if (localStorage.getItem("step1")) {
        document.querySelector(".edit-second").style.display = "block"
        document.querySelector(".edit-first").style.display = "none"
        gray.style.display = "block"
        modalEdit.style.display = "block"
    }


    // seocnd step uploading bg img
    const btn2 = document.getElementById("skip2")
    const upload2 = document.getElementById("bg-upload")
    const skip2 = document.querySelector(".skip-second");

    skip2.addEventListener("click", () => {
        document.querySelector(".edit-third").style.display = "block"
        document.querySelector(".edit-second").style.display = "none"
    })

    upload2.addEventListener("change", (e) => {
        btn2.style.display = "block"
        skip2.style.display = "none"
        btn2.innerHTML = "Next"

        var reader = new FileReader();

        // reader.onload = (e) => {
        //     const displayImage = document.getElementById("displayImage2");
        //     displayImage.src = e.target.result;
        //     displayImage.style.display = "block"
        //     document.querySelector(".user-dummy").style.opacity = 0;
        // }

        reader.readAsDataURL(e.target.files[0])


        btn2.addEventListener("click", () => {
            localStorage.setItem("step2", "done")
            localStorage.removeItem("step1", "done")
        })


    })

    if (localStorage.getItem("step2")) {
        document.querySelector(".edit-third").style.display = "block"
        document.querySelector(".edit-second").style.display = "none"
        document.querySelector(".edit-first").style.display = "none"
        gray.style.display = "block"
        modalEdit.style.display = "block"
    }

    // third step ( adding bio )
    const bio = document.querySelector(".input-bio");
    const countBio = document.getElementById("count-bio")
    const btn3 = document.getElementById("skip3")
    const skip3 = document.querySelector(".skip-third")

    skip3.addEventListener("click", () => {
        document.querySelector(".edit-third").style.display = "none"
        document.querySelector(".edit-forth").style.display = "block"
    })

    bio.addEventListener("input", (e) => {
        value = bio.value
        valueCount = value.length;
        countBio.innerHTML = valueCount + "/" + 160;
        if (valueCount <= 0) {
            skip3.style.display = "flex"
            btn3.style.display = "none"
        } else {
            skip3.style.display = "none"
            btn3.style.display = "flex"
        }

    })

    btn3.addEventListener("click", () => {
        localStorage.setItem("step3", "done");
        localStorage.removeItem("step2")
    })

    if (localStorage.getItem("step3")) {
        document.querySelector(".edit-third").style.display = "none"
        document.querySelector(".edit-forth").style.display = "block"
        document.querySelector(".edit-first").style.display = "none"
        document.querySelector(".edit-second").style.display = "none"
        gray.style.display = "block"
        modalEdit.style.display = "block"

    }


    // forth step

    const locationInput = document.querySelector(".input-location")
    const countLocation = document.getElementById("count-location");
    const btn4 = document.getElementById("skip4")
    const skip4 = document.querySelector(".skip-forth");

    skip4.addEventListener("click", () => {
        document.querySelector(".edit-forth").style.display = "none"
        gray.style.display = "none"
        modalEdit.style.display = "none"

    })

    locationInput.addEventListener("input", () => {

        valueLocation = locationInput.value;
        locationCount = valueLocation.length;
        countLocation.innerHTML = locationCount + "/" + 30;
        if (locationCount <= 0) {
            skip4.style.display = "flex"
            btn4.style.display = "none"
        } else {
            skip4.style.display = "none"
            btn4.style.display = "flex"
        }
    })

    btn4.addEventListener("click", () => {
        document.querySelector(".edit-forth").style.display = "none"
        document.querySelector(".edit-third").style.display = "none"
        document.querySelector(".edit-second").style.display = "none"
        document.querySelector(".edit-first").style.display = "none"
        localStorage.removeItem("step3")

    })
    </script>

</body>

</html>