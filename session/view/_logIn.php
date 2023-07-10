<?php
session_start();
    



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signUp.css">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="signUp-form">
            <h1>Log in</h1>
            <?php if (isset($_SESSION["error"])): ?>
                <p class="red padding_t20 error">Log in failed! <br> Invalid username, email, or password!</p>
            <?php endif;?>
            <form action="../app/controller/loginController.php" method="post">
                <div class="container ">
                    <div class="name">
                        <div class="title">
                            <label for="">username</label>
                        </div>
                        <input type="text" placeholder="john smith" required name="username">
                    </div>

                </div>
                <div class="container">
                    <div class="email">
                        <div class="title">
                            <label for="">email</label>
                        </div>
                        <input type="email" placeholder="example@gmail.com" name="email" required>
                    </div>
                </div>
                <div class="container">
                    <div class="password">
                        <div class="title">
                            <label for="">password</label>
                        </div>
                        <input type="current-password" minlength="6" name="password" required
                            placeholder="at least 6 characters">
                    </div>
                    <input type="hidden" value="<?= $userInfo["id"]?>" name="user_id">
                </div>
                <div class="container">
                    <input type="submit" value="Log in" class="submit" name="submit">
                </div>
            </form>
            <p>You don't have your own account yet?</p> <br>
            <p class="fontSize_15"><a href="../session/signUp.php" class="white">Sign up</a></p>


        </div>
    </main>
</body>

</html>
