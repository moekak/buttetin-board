<?php
/** @var $pdo \PDO */
require_once "../DB.php";

$username = "";
$email = "";
$password = "";
$submit = "";

if (isset($_POST["submit"])) {
    if ($_POST["username"]) {
        $username = $_POST["username"];
    }
    if ($_POST["email"]) {
        $email = $_POST["email"];
    }
    if ($_POST["password"]) {
        $password = $_POST["password"];

    }
}

if (isset($_POST["submit"]) && $username && $email && $password) {
    $statement = $pdo->prepare("SELECT * FROM `user` WHERE username = :username AND email = :email");
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $userInfo = $statement->fetch(PDO::FETCH_ASSOC);

    echo $userInfo["password"];

  


    if($userInfo && password_verify($password, $userInfo["password"])){
        echo "success";
    } else{
        echo "fail";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="signUp-form">
            <h1>Log in</h1>
            <form action="" method="post">
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
