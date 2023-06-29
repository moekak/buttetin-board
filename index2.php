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

// $counts = $_SESSION["likesCount"];
$userName = $_SESSION["username"];
$userEmail = $_SESSION["email"];
$userIcon = $_SESSION["icon"];

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
    <div class="bg-gray"></div>
    <div class="index-container">
        <div class="nav-second" id="nav-second">
            <i class="fab fa-twitter"></i>
            <div class="social-icon-container hover2">
                <i class="fas fa-search"></i>
                <p>Explore</p>
            </div>
            <div class="social-icon-container hover3">
                <i class="fas fa-cog"></i>
                <p>Settings</p>
            </div>
        </div>
        <main class="bg">
            <h3 class="explore">Explore</h3>

            <?php foreach ($postData as $post): ?>
            <div class="post-container" data-post-id="<?php echo $post["id"] ?>">
                <div class="explore">

                </div>
                <div class="left relative">
                    <div class="post-comment-container">
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
                                <a class="comment"><?=$post["comments_count"]?></a>
                            </div>
                            <div class="like-container">
                                <!-- <form action="./app/controller/likePost.php" method="post"> -->
                                <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                <button type="submit" class=" btn-submit like-btn"
                                    data-post-id="<?php echo $post["id"] ?>">
                                    <i class="far fa-heart"></i>
                                    <div class="post" id="<?php echo $post["id"] ?>">
                                        <p class="likeCount"><?php echo $post["likes_count"] ?></p>
                                    </div>
                                </button>
                                <!--
                        </form> -->
                            </div>
                            <div class="dislike-container">
                                <button type="submit" class="black btn-submit dislike-btns"
                                    data-post-id="<?php echo $post["id"] ?>">
                                    <i class="far fa-thumbs-down"></i>
                                    <p>not interested</p>
                                </button>
                            </div>
                            <!-- <div class="delete-btn">
                            <form action="./app/controller/delete.php" method="post">
                                <i class="fas fa-trash-alt"></i>
                                <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $post["user_id"] ?>">
                                <button class="submit-btn" type="submit">Delete</button>
                            </form>
                        </div> -->


                        </div>
                    </div>
                    <!-- <div class="comment_container">
                        <?php if ($userIcon) {?>
                        <img src="<?php echo $path . $userIcon ?>" alt="" class="user-icon2">
                        <?php } else {?>
                        <img src="./assets/img/user-dummy.png" alt="" class="user-icon2">
                        <?php }?>
                        <form action="./app/controller/commentController.php" method="post" class="w100">
                            <input type="hidden" value="<?php echo $post["id"] ?>" name="post_id">
                            <input type="hidden" value="<?php echo $post["user_id"] ?>" name="user_id">
                            <input type="text" name="comment" class="comment-input" placeholder="Tweet your reply!">
                            <input type="submit" name="reply-btn" class="reply" value="reply">
                        </form>
                    </div> -->

                </div>
            </div>
            <?php endforeach;?>

        </main>
        <div class="signup-container">
            <div class="left4">
                <h3>Don't miss what's happening.</h3>
                <p>People on Twitter are the first to know.</p>
            </div>
            <div class="right">
                <div class="login-btn">
                    Log in
                </div>
                <div class="signup-btn" id="sign-btn">
                    Sign up
                </div>
            </div>
        </div>
        <!-- サインアップ -->
        <div class="register-container" id="register">
            <div id="close">×</div>
            <div class="step-first">

                <div class="top">
                    <i class="fab fa-twitter"></i>
                    <h2>Join Twitter today</h2>
                </div>
                <div class="google">
                    <button>
                        <div class="icon-left">
                            <img src="./assets/img/user-dummy.png" alt="" class="user-icon4">
                        </div>
                        <div class="right-name">
                            <p>Sign in as moeka</p>
                        </div>
                        <div class="google-icon">
                            <i class="fab fa-google"></i>
                        </div>
                    </button>
                </div>
                <div class="apple">
                    <button>
                        <div class="icon-left">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="right-name apple-text">
                            <p>Sign up with Apple</p>
                        </div>
                    </button>
                </div>
                <div class="border"><span>――――――――</span> or <span>――――――――</span></div>
                <div class="create-account">
                    <button id="create-btn">Create account</button>
                </div>
                <p class="policy">By signing up, you agree to the <span> Terms of Service</span>and <span> Privacy
                        Policy,</span>including<span> Cookie Use.</span></p>
                <div class="login-ask">
                    <p>Have an account already? <a href="">Log in</a></p>
                </div>
            </div>


            <!-- step 2 -->
            <div class="stepNext">
                <div class="step1">
                    <h3>Step 1 of 5</h3>
                    <h2>Create your account</h2>
                    <div class="relative">
                        <input type="text" class="input-name" name="useranme" placeholder="Name" maxlength="50">
                        <p class="count absolute"></p>
                        <input type="text" class="input-phone" name="phonenumber" placeholder="Phone">
                        <p class="alert-phone">Please enter a valid phone number.</p>
                    </div>
                    <div class="date-of-birth">
                        <h4>Date of birth</h4>
                        <p>This will not be shown publicly. Confirm your own age, even if this account is for a
                            business, a
                            pet, or something else.</p>
                        <div class="select-container">
                            <select name="month" id="month">
                                <option selected disabled>Month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <select name="day" id="day">
                                <option selected disabled>Day</option>
                                <?php for ($i = 1; $i < 32; $i++) {?>
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php }?>
                            </select>
                            <select name="year" id="year">
                                <option selected disabled>Year</option>
                                <?php for ($i = 1903; $i < 2023; $i++) {?>
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <button class="next">Next</button>
                </div>
            </div>
            <!-- step 3 -->
            <div class="step-third">
                <div class="step1">
                    <h3>Step 2 of 5</h3>
                    <h2>Create your account</h2>
                    <div class="relative">
                        <input type="text" class="input-name-check" name="useranme" placeholder="Name" maxlength="50">
                        <p class="count absolute"></p>
                        <input type="text" class="input-phone-check" name="phonenumber" placeholder="Phone">
                        <input type="text" class="input-birthday-check" name="birthdaynumber" placeholder="Date of birth">
                    </div>
                    
                </div>

            </div>
        </div>

    </div>

    <script src="./js/main.js"></script>
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



    const register = document.getElementById("register");
    const signBtn = document.getElementById("sign-btn");
    const bg = document.querySelector(".bg-gray");
    const close = document.getElementById("close");

    signBtn.addEventListener("click", () => {
        register.style.display = "block"
        bg.style.display = "block"

    })
    close.addEventListener("click", () => {
        register.style.display = "none"
        bg.style.display = "none"
    })

    const create = document.getElementById("create-btn");
    const step1 = document.querySelector(".step-first")
    const step2 = document.querySelector(".stepNext")
    const step3 = document.querySelector(".step-third");

    create.addEventListener("click", () => {
        step1.style.display = "none"
        step2.style.display = "block";

    })

    // validation check (step 1 of 5)
    const name = document.querySelector(".input-name");
    const phone = document.querySelector(".input-phone");
    const year = document.getElementById("year");
    const month = document.getElementById("month");
    const day = document.getElementById("day");
    const nextBtn = document.querySelector(".next")




    document.addEventListener("input", () => {
        const nameValue = name.value;
        const phoneValue = phone.value;
        const yearValue = year.value;
        const monthValue = month.value;
        const dayValue = day.value;
        console.log(monthValue);


        // 電話番号のvalidation check
        const phoneRegex = /^\d{10,11}$/;
        const alertPhone = document.querySelector(".alert-phone");
        phone.addEventListener("input", () => {
            if (phoneRegex.test(phoneValue)) {
                alertPhone.style.display = "none";
                phone.style.border = "1px solid rgba(0, 0, 0, 0.185)"

            } else {
                alertPhone.style.display = "block";
                phone.style.outline = "none";
                phone.style.border = "2px solid red"
            }
        })

        if (!(nameValue == "") && ((!phoneValue == "") && (phoneRegex.test(phoneValue))) && (!(yearValue ==
                "Year") && !(yearValue == "")) && (!(
                monthValue ==
                "Month") && !(monthValue == "")) && (!(dayValue == "Day") && !(dayValue == ""))) {
            nextBtn.style.pointerEvents = "auto"
            nextBtn.style.backgroundColor = "black";
        } else {
            nextBtn.style.pointerEvents = "none"
            nextBtn.style.backgroundColor = "rgba(0, 0, 0, 0.637)";
        }

        // ボタン押されたらとりあえずlocalstrageに保存する
        nextBtn.addEventListener("click", () => {
            localStorage.setItem("name", nameValue)
            localStorage.setItem("phone", phoneValue)
            localStorage.setItem("month", monthValue)
            localStorage.setItem("day", dayValue);
            localStorage.setItem("year", yearValue);

            step2.style.display = "none";
            step3.style.display = "block";
        })
        //   カウント数える nameinputの
        const countNum = document.querySelector(".count");
        countNum.innerHTML = nameValue.length + "/ 50";
        // if(nameValue.length == 0){
        //     name.style.border = "2px solid red";

        // }

    })


    // データをlocalstrageから取り出す
    const getNameData = localStorage.getItem("name")
    const getPhoneData = localStorage.getItem("phone")
    const getMonthData = localStorage.getItem("month")
    const getDayData = localStorage.getItem("day")
    const getYearData = localStorage.getItem("year")

    const inputName = document.querySelector(".input-name-check")
    const inputPhone = document.querySelector(".input-phone-check")
    const inputBirthday = document.querySelector(".input-birthday-check")

    if(getNameData){
        inputName.value = getNameData;
    }
    if(getPhoneData){
        inputPhone.value = getPhoneData;
    }
    </script>
</body>

</html>