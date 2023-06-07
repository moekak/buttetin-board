<?php
require_once(dirname(__FILE__) . "../../app/function/Validation.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signUp.css">
    <style>
        #style{
            border: <?= $_SESSION["style"][0] ?>;
        }

        #label{
            color: <?= $_SESSION["style"][1] ?>
            
        }
    </style>
    <title>Document</title>
</head>

<body>
    <main>
        <div class="signUp-form">
            <h1>Sign up</h1>
            <form action="../app/controller/SignupController.php" method="post" enctype="multipart/form-data">
                <div class="icon">
                    <img src="../img/user-dummy.png" alt="" class="user">
                    <input type="file" name="icon">
                </div>
                <div class="container">
                    <div class="name">
                        <div class="title">
                            <label for="">username</label>
                        </div>
                        <input type="text" placeholder="john smith" name="username" required>
                    </div>

                </div>
                <div class="container">
                    <div class="email">
                        <div class="title">
                            <label for="" id="label">email</label>
                        </div>
                        <input type="email" placeholder="example@gmail.com" required name="email" id="style">
                        <?php if (isset($_SESSION["style"])): ?>
                            <p class="red padding_t20">this email address is already registered</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="container">
                    <div class="password">
                        <div class="title">
                            <label for="">password</label>
                        </div>
                        <input type="current-password" minlength="6" required placeholder="at least 6 characters" name="password">
                    </div>
                </div>
                <div class="container">
                    <input type="submit" value="Sign up" class="submit" name="submit">
                </div>
            </form>
            <p>You already have your own account?</p> <br>
            <p class="fontSize_1"><a href="../view/logIn.php" class="white">Log in</a></p>


        </div>
    </main>

    
</body>

</html>