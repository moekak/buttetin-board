<?php

$path = "./images/";
$path2 = "./images3/";

session_start();
$userDetails = "";
if (isset($_SESSION["userDetail"])) {
    $userDetails = $_SESSION["userDetail"];
}

$dateTime =  $userDetails[0]["created_at"];
$date = new DateTime($dateTime);

$month = $date->format("F");
$year = $date->format("Y");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            <?php foreach ($userDetails as $userDetail) { ?>
            <div class="bg-img-container">
                <div class="icon2 relative">
                    <div class="bg-container-edit">
                        <?php if ($userDetail["bg_img"]) {?>
                        <img src="<?php echo $path2 . $userDetail["bg_img"] ?>" alt="" class="bg-img">
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
                            <?php if ($userDetail["icon"]) {?>
                            <img src="<?php echo $path . $userDetail["icon"] ?>" alt="" class="user-icon3">
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
                    <div id="follow-btn">Follow</div>
                </button>
            </div>
            <div class="info-detail">
                <p class="personal-info font_size2 bold"><?=$userDetail["name"]?></p>
                <p class="personal-email"><?=$userDetail["login_name"]?></p>
                <p class="introdution"><?=$userDetail["introduction"]?></p>
                <p class="join_date"><i class="far fa-calendar-alt"> Joined <?=$month?> <?=$year?> </i></p>
                <div class="detail-info">
                    <p class="place"><i class="fas fa-map-marker-alt"> </i> <?=$userDetail["country"]?></p>
                    <a href="<?=$userDetail["web_site"]?>" class="web" target="_blank"><i class="fas fa-link"></i> <?=$userDetail["web_site"]?></a>
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
            <?php }?>
            <div class="choosing-container">
                <a href="/">Tweets</a>
                <a href="/">Tweets & replies</a>
                <a href="/">Media</a>
                <a href="/">Likes</a>
            </div>

        </main>

    </div>
</body>

</html>