<?php
/** @var $pdo \PDO */
require_once "../DB.php";

$username = "";
$email = "";
$password = "";
$hashed_password = "";
$submit = "";
$errorsArray = [];

if (isset($_POST["submit"])) {
    if ($_POST["username"]) {
        $username = $_POST["username"];
    }
    if ($_POST["email"]) {
        $email = $_POST["email"];
    }
    if ($_POST["password"]) {
        $password = $_POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

}

// 同じメールアドレスかどうかチェックする処理
if (isset($_POST["submit"]) && $username && $email && $password) {
    $statement = $pdo->prepare("SELECT * FROM `user` WHERE  email = :email");

    $statement->bindValue(':email', $email);
    $statement->execute();
    $userInfo = $statement->fetch(PDO::FETCH_ASSOC);
    

    if ($userInfo["email"] === $email) {
        $errorsArray[] = "this email address is already registered";

    } else {
        if (isset($_POST["submit"]) && $username && $email && $password) {
            $statement = $pdo->prepare("INSERT INTO `user` (`username`, `email`, `password`) VALUES (:username, :email, :password)");
            $statement->bindValue(':username', $username);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $hashed_password);

            $statement->execute();

        }

        header("Location: ../index.php");
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
            <h1>Sign up</h1>
            <form action="" method="post">
                <div class="icon">
                    <img src="img/user-dummy.png" alt="" class="user">
                    <input type="file">
                </div>
                <div class="container ">
                    <div class="name">
                        <div class="title">
                            <label for="">username</label>
                        </div>
                        <input type="text" placeholder="john smith" name="username" required >
                    </div>

                </div>
                <div class="container">
                    <div class="email">
                        <div class="title">
                            <label for="" id="js_email_title">email</label>
                        </div>
                        <input type="email" placeholder="example@gmail.com" required name="email" id="js_email">
                        <?php if($errorsArray) :?>
                          <p class="red padding_t20">this email address is already registered</p>
                        <?php endif ;?>
                    </div>
                </div>
                <div class="container">
                    <div class="password">
                        <div class="title">
                            <label for="">password</label>
                        </div>
                        <input type="current-password" minlength="6" required placeholder="at least 6 characters"
                            name="password">
                    </div>
                </div>
                <div class="container">
                    <input type="submit" value="Sign up" class="submit" name="submit">
                </div>
            </form>
            <p>You already have your own account?</p> <br>
            <p class="fontSize_1"><a href="../session/logIn.php" class="white">Log in</a></p>


        </div>
    </main>

    <script>
      const input = document.getElementById("js_email");
      const title = document.getElementById("js_email_title")

      <?php if($errorsArray) {?>
        input.style.border = "2px solid red";
        input.style.backgroundColor = "rgb(255, 0, 0, 0.3)"
        input.style.color = "red"
        title.style.color = "red";
      <?php }?>
    </script>
</body>

</html>
