<?php
require_once dirname(__FILE__) . "/app/controller/controller.php";
require_once dirname(__FILE__) . "/app/controller/likePost.php";
require_once dirname(__FILE__) . "/app/service/postServiceFn.php";

$like = new postService();

$path = "./images/";

// echo $_SESSION["user_id"];
$post = $_SESSION["postData"];

// $counts = $_SESSION["likesCount"];
// $userName = $_SESSION["username"];
// $userEmail = $_SESSION["email"];
// $userIcon = $_SESSION["icon"];

// $userId = "";
// if ($_SESSION["user_id"]) {
//     $userId = $_SESSION["user_id"];
// }
// echo $_SESSION["user_id"];
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
    <article class="bg2">
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
                            <button type="submit" class="black btn-submit dislike-btns"
                                data-post-id="<?php echo $post["id"] ?>">
                                <i class="far fa-thumbs-down"></i>
                                <p>not interested</p>
                            </button>
                        </div>
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
    </article>
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
        <div class="step-first">
            <div class="close">×</div>
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
            <div class="close">×</div>
            <div class="step1">
                <h3>Step 1 of 5</h3>
                <h2>Create your account</h2>
                <div class="relative">
                    <input type="text" class="input-name" name="useranme" placeholder="Name" maxlength="50">
                    <p class="count absolute"></p>
                    <input type="text" class="input-phone" name="phonenumber" placeholder="Phone">
                    <p class="alert-phone">Please enter a valid phone number.</p>
                    <p class="alert-phone2">This number is already in use with other accounts. Please use another.
                    </p>
                </div>
                <div class="date-of-birth">
                    <h4>Date of birth</h4>
                    <p>This will not be shown publicly. Confirm your own age, even if this account is for a
                        business, a
                        pet, or something else.</p>
                    <div class="select-container">
                        <select name="month" id="month">
                            <option selected disabled>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
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
            <div class="return1">←</div>
            <div class="step1">
                <h3>Step 2 of 5</h3>
                <h2>Create your account</h2>
                <div class="relative">
                    <!-- <form action="./session/app/controller/SignupController.php" method="post"> -->
                    <input type="text" class="input-name-check" name="username" placeholder="Name" maxlength="50">
                    <i class="fas fa-check-circle absolute checked1"></i>
                    <i class="fas fa-times absolute close1"></i>
                    <input type="text" class="input-phone-check" name="phonenumber" placeholder="Phone">
                    <i class="fas fa-check-circle absolute checked2"></i>
                    <i class="fas fa-times absolute close2"></i>
                    <input type="text" class="input-birthday-check" name="birthday" placeholder="Date of birth">
                    <i class="fas fa-check-circle absolute checked3"></i>
                    <i class="fas fa-times absolute close3"></i>
                    <p class="alert">By signing up, you agree to the <a href="">Terms of Service</a> and <a
                            href="">Privacy
                            Policy</a>, including <a href="">Cookie Use</a>. Twitter
                        may use your contact information, including your email address and phone number for
                        purposes
                        outlined in our Privacy Policy, like keeping your account secure and personalizing our
                        services,
                        including ads. <a href="">Learn more.</a> Others will be able to find you by email or
                        phone number,
                        when provided,
                        unless you choose otherwise <a href="">here</a>.</p>
                    <button class="signUp-btn" type="submit">Sign up</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <!-- step4 -->
        <div class="step-forth">
            <div class="step1">
                <h3>Step 3 of 5</h3>
                <h2>Create your password</h2>
                <div class="relative">
                    <!-- <form action="./session/app/controller/SignupController.php" method="post"> -->
                    <input type="password" class="input-password" name="username" placeholder="password" maxlength="30">
                    <div class="length-check">
                        <i class="fas fa-check"></i>
                        <p>at least 8 characters long</p>
                    </div>
                    <div class="contain-lower">
                        <i class="fas fa-check"></i>
                        <p>at least one lowercase letter</p>
                    </div>
                    <div class="contain-upper">
                        <i class="fas fa-check"></i>
                        <p>at least one uppercase letter</p>
                    </div>
                    <div class="contain-num">
                        <i class="fas fa-check"></i>
                        <p>at least one number</p>
                    </div>
                    <div class="contain-special">
                        <i class="fas fa-check"></i>
                        <p>at least one special character</p>
                    </div>
                    <a href="#five" onclick="location.reload();"><button class="next-btn"
                            type="submit">Submit</button></a>
                </div>
            </div>
        </div>
        <!-- icon -->

    </div>
    <div class="icon-container-signup ">
        <div class="step-fifth" id="five">
            <div class="step1">
                <i class="fab fa-twitter two"></i>
                <?=$_SESSION["user_id"]?>
                <h2>Choose profile picture</h2>
                <p class="upload">Let's upload your favorite picture</p>
                <div class="relative">
                    <form action="./session/app/controller/SignupController.php" method="post"
                        enctype="multipart/form-data">
                        <div class="icon">
                            <img src="./assets/img/user-dummy.png" alt="" class="user-dummy">
                            <input type="file" name="icon" id="icon-btn">
                            <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img2">
                        </div>
                        <button class="next-btn2" type="submit" name="submit">later</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ================== sign in page ================ -->
    <div class="signIn-container relative" id="sign-in">
        <div class="close-modal">×</div>
        <div class="step-first signIn">
            <div class="top">
                <i class="fab fa-twitter"></i>
                <h2>Sign in to Twitter</h2>
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
                        <p>Sign in with Apple</p>
                    </div>
                </button>
            </div>
            <div class="border"><span>――――――――</span> or <span>――――――――</span></div>
            <div class="input-signIn">
                <input type="text" placeholder="Phone, email, or username" id="signIn">
            </div>
            <div class="create-account">
                <button id="signin-btn">Next</button>
            </div>
            <div class="signin-ask">
                <p>Don't have an account? <a href="">Sign up</a></p>
            </div>
        </div>
        <div class="error-container absolute">
            <p class="error-text">Sorry, we could not find your account.</p>
        </div>

        <div class="step-first2 signIn-password">
            <div class="top">
                <i class="fab fa-twitter"></i>
                <h2>Enter your password</h2>
            </div>
            <div class="input-read">
                <input type="text" readonly id="phone-read">
            </div>
            <div class="input-signIn">
                <input type="password" placeholder="Password" id="pass">
            </div>
            <div class="create-account" id="check-btn">
                <button id="signin-check">Next</button>
            </div>
            <div class="signin-ask">
                <p>Don't have an account? <a href="">Sign up</a></p>
            </div>
        </div>
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
    const closes = document.querySelectorAll(".close");

    signBtn.addEventListener("click", () => {
        register.style.display = "block"
        bg.style.display = "block"
        

    })

    closes.forEach((close) => {
        close.addEventListener("click", () => {
            register.style.display = "none"
            bg.style.display = "none"
            localStorage.removeItem("loaded")
        })

    })

    const create = document.getElementById("create-btn");
    const step1 = document.querySelector(".step-first")
    const step2 = document.querySelector(".stepNext")
    const step3 = document.querySelector(".step-third");
    const step4 = document.querySelector(".step-forth");
    const step5 = document.querySelector(".step-fifth");
    const iconContainer = document.querySelector(".icon-container-signup")
    const phone = document.querySelector(".input-phone");
    const alertPhone = document.querySelector(".alert-phone");

    if (localStorage.getItem("loaded") == "loaded") {
        console.log("1234");
        iconContainer.style.display = "block"
        step5.style.display = "block";
        bg.style.display = "block"
    } else if (localStorage.getItem("loaded") == "failed") {
        register.style.display = "block"
        step1.style.display = "none"
        step4.style.display = "none";
        step2.style.display = "block";
        bg.style.display = 'block'
        document.querySelector(".alert-phone2").style.display = "block";
        phone.style.border = "2px solid red"
        alertPhone.style.display = "none";

    }

    create.addEventListener("click", () => {
        step1.style.display = "none"
        step2.style.display = "block";

    })

    // validation check (step 1 of 5)
    const password = document.querySelector(".input-password");
    const next = document.querySelector(".next-btn");
    const name = document.querySelector(".input-name");
    const year = document.getElementById("year");
    const month = document.getElementById("month");
    const day = document.getElementById("day");
    const nextBtn = document.querySelector(".next")

    const inputName = document.querySelector(".input-name-check")
    const inputPhone = document.querySelector(".input-phone-check")
    const inputBirthday = document.querySelector(".input-birthday-check");

    const signup = document.querySelector(".signUp-btn");


    let nameValue = ""
    let phoneValue = "";
    let yearValue = "";
    let monthValue = "";
    let dayValue = "";
    let passwordValue = "";


    document.addEventListener("input", (e) => {
        nameValue = name.value;
        phoneValue = phone.value;
        yearValue = year.value;
        monthValue = month.value;
        dayValue = day.value;



        // 電話番号のvalidation check
        const phoneRegex = /^\d{10,11}$/;

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



        const check1 = document.querySelector(".checked1")
        const check2 = document.querySelector(".checked2")
        const check3 = document.querySelector(".checked3")

        const close1 = document.querySelector(".close1")
        const close2 = document.querySelector(".close2")
        const close3 = document.querySelector(".close3")

        // ボタン押されたらとりあえずlocalstrageに保存する
        nextBtn.addEventListener("click", () => {

            step2.style.display = "none";
            step3.style.display = "block";

            if (nameValue) {
                inputName.value = nameValue;
                check1.style.display = "block";
                close1.style.display = "none";
            } else {
                inputName.value = "";
                check1.style.display = "none";
                close1.style.display = "block";
            }
            if (phoneValue) {
                inputPhone.value = phoneValue;
                check2.style.display = "block";
                close2.style.display = "none";
            } else {
                inputPhone.value = "";
                check2.style.display = "none";
                close2.style.display = "block";
            }
            if (dayValue && monthValue && yearValue) {
                const date = monthValue + " " + dayValue + "," + yearValue;
                inputBirthday.value = date;
                check3.style.display = "block";
                close3.style.display = "none";
            } else {
                inputBirthday.value = "";
                check3.style.display = "none";
                close3.style.display = "block";
            }
        })
        //   カウント数える nameinputの
        const countNum = document.querySelector(".count");
        countNum.innerHTML = nameValue.length + "/ 50";

        // パスワードチェック


        passwordValue = password.value;


        const pattern1 = /.{8,}/;
        // 小文字が含まれているか
        const pattern2 = /[a-z]/;
        // 一つ以上の数字が含まれているか
        const pattern3 = /[0-9]/;
        // 一つ以上の記号が含まれているか
        const pattern4 = /[^a-zA-Z\d]/;
        // 大文字が含まれているか
        const pattern5 = /[A-Z]/;

        if (pattern1.test(passwordValue)) {
            length.style.color = "green"
        } else {
            length.style.color = "red";
        }
        if (pattern2.test(passwordValue)) {
            lower.style.color = "green"
        } else {
            lower.style.color = "red";
        }
        if (pattern3.test(passwordValue)) {
            num.style.color = "green"
        } else {
            num.style.color = "red";
        }
        if (pattern4.test(passwordValue)) {
            special.style.color = "green"
        } else {
            special.style.color = "red";
        }
        if (pattern5.test(passwordValue)) {
            upper.style.color = "green"
        } else {
            upper.style.color = "red";
        }

        if (pattern5.test(passwordValue) && pattern4.test(passwordValue) && pattern3.test(
                passwordValue) &&
            pattern2.test(passwordValue) && pattern1.test(passwordValue)) {
            next.style.pointerEvents = "auto";
            next.style.backgroundColor = "var(--blue)"
        } else {
            next.style.pointerEvents = "none";
            next.style.backgroundColor = " rgba(0, 0, 0, 0.521)"
        }

        // fetch api



    })


    next.addEventListener("click", () => {
        step5.style.display = "block";
        const data = [nameValue, phoneValue, monthValue + " " + dayValue + "," + yearValue,
            passwordValue
        ];

        fetch("./session/app/signUpApi.php", {

                // 第1引数に送り先
                method: "POST", // メソッド指定
                headers: {
                    "Content-Type": "application/json"
                }, // jsonを指定

                body: JSON.stringify(data), // json形式に変換して添付
            })
            .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
            .then((res) => {
                console.log(res); // やりたい処理
                if (res == "error") {
                    localStorage.setItem("loaded", "failed")
                } else {
                    localStorage.setItem("loaded", "loaded")
                }
            })
            .catch((error) => {
                console.log(error);


            });
    })

    // ＝＝＝＝＝＝＝＝＝＝＝＝End＝＝＝＝＝＝＝＝＝＝＝＝＝


    // })
    const return1 = document.querySelector(".return1");

    return1.addEventListener("click", () => {
        step3.style.display = "none";
        step2.style.display = "block";
    })

    inputName.addEventListener("focus", () => {
        step3.style.display = "none";
        step2.style.display = "block";
        name.focus();
    })
    inputPhone.addEventListener("focus", () => {
        step3.style.display = "none";
        step2.style.display = "block";
        phone.focus();
    })
    inputBirthday.addEventListener("focus", () => {
        step3.style.display = "none";
        step2.style.display = "block";
        month.focus();
    })

    signup.addEventListener("click", () => {
        step3.style.display = "none";
        step4.style.display = "block"
    })





    const length = document.querySelector(".length-check");
    const lower = document.querySelector(".contain-lower");
    const upper = document.querySelector(".contain-upper");
    const num = document.querySelector(".contain-num");
    const special = document.querySelector(".contain-special");
    const btn2 = document.querySelector(".next-btn2")


    const upload = document.getElementById("icon-btn");
    btn2.addEventListener("click", () => {
        localStorage.removeItem("loaded")
    })

    upload.addEventListener("change", (e) => {
        // ユーザーのコンピュータ上のファイル（通常はユーザーがフォームを通じて選択したもの）を非同期に読み取る
        var reader = new FileReader();

        // FileReaderオブジェクトがファイルの読み込みを完了したときに発火する
        reader.onload = (e) => {
            dispayImage = document.getElementById("displayImage2");
            // データURLを返す（e.target.result）
            console.log(e.target.result);
            dispayImage.src = e.target.result;
            dispayImage.style.display = "block";
            btn2.innerHTML = "upload";
            btn2.style.backgroundColor = "var(--blue)"
            btn2.style.pointerEvents = "auto";
        }
        // イベントオブジェクト e の target プロパティ（この場合、ファイルを選択する <input> 要素）の files プロパティを通じて選択されたファイルのリストにアクセスし、その中の最初のファイルを取り出している(e.target.files[0])
        reader.readAsDataURL(e.target.files[0]);
    })



    // sign in の処理
    const signInBtn = document.getElementById("signin-btn");
    const signInInput = document.getElementById("signIn");
    const firstStep = document.querySelector(".signIn")
    const signInPassword = document.querySelector(".signIn-password");
    const signin = document.getElementById("sign-in");
    const loginBtn = document.querySelector(".login-btn");
    const pass = document.getElementById("pass");
    const read = document.getElementById("phone-read")
    const signinCheck = document.getElementById("check-btn")
    const errorText = document.querySelector(".error-container")
    const close = document.querySelector(".close-modal");

    close.addEventListener("click", () => {
        console.log("ress");
        signin.style.display = "none";
        bg.style.display = "none"
        // signInPassword.style.display = "none"
    })

    loginBtn.addEventListener("click", () => {
        signin.style.display = "block";
        bg.style.display = "block"
    })

    let signinValue = "";

    signInInput.addEventListener("input", (e) => {
        signinValue = e.target.value;
    })

    signInBtn.addEventListener("click", () => {
        fetch("./session/app/logInApi.php", {

                // 第1引数に送り先
                method: "POST", // メソッド指定
                headers: {
                    "Content-Type": "application/json"
                }, // jsonを指定

                body: JSON.stringify(signinValue), // json形式に変換して添付
            })
            .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
            .then((res) => {
                console.log(res); // やりたい処理
                if (!(res == "error")) {
                    errorText.style.display = "none"
                    firstStep.style.display = "none";
                    signInPassword.style.display = "block"
                    read.value = res;
                    let password = "";
                    pass.addEventListener("input", (e) => {
                        password = e.target.value
                    })
                    signinCheck.addEventListener("click", () => {

                        const data = [signinValue, password]
                        fetch("./session/app/passwordCheckApi.php", {

                                // 第1引数に送り先
                                method: "POST", // メソッド指定
                                headers: {
                                    "Content-Type": "application/json"
                                }, // jsonを指定

                                body: JSON.stringify(data), // json形式に変換して添付
                            })
                            .then((response) => response.json()) // 返ってきたレスポンスをjsonで受け取って次のthenへ渡す
                            .then((res) => {
                                console.log(res);
                                if (res == "success") {
                                    errorText.style.display = "none"
                                    window.location.replace("./index.php")
                                } else {
                                    errorText.firstElementChild.innerHTML = "wrong password!"
                                    errorText.style.display = "block"
                                }
                            })
                            .catch((error) => {
                                console.log(error);
                            });
                    })


                } else {
                    errorText.style.display = "block"

                }
            })
            .catch((error) => {
                console.log(error);
            });

    })
    </script>
</body>

</html>