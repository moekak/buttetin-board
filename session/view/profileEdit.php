




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="profile_edit_container">
        <form action="../app/controller/editController.php" method="post">
            <div class="icon2 relative">
                <img src="../../assets/img/bg.png" alt="" class="bg-img">
                <div class="camera absolute">
                    <i class="far fa-plus-square camera-icon"></i>
                </div>
                <input type="file" name="bg">
                <div class="input-icon">
                    <div class="camera2 absolute">
                        <img src="../../assets/img/user-dummy.png" class="user-icon3">
                    </div>
                    <input type="file" name="icon">
                </div>
            </div>
            <!-- =============info---------------- -->
            <div class="info-container ">
                <div class="name-container">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="intro-container">
                    <label for="intro">Introduction</label>
                    <textarea type="text" id="intro" name="intro"></textarea>
                </div>
                <div class="web-container">
                    <label for="web">Web</label>
                    <input type="text" id="web" placeholder="Add your website" name="web">
                </div>
                <div class="bd-container">
                    <label for="bd">Birthday</label>
                    <input type="text" id="bd" placeholder="Add your birthday" name="birthday">
                </div>

            </div>
            <input type="submit" name="submit">


        </form>
    </div>

</body>

</html>