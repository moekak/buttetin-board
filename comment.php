<?php
session_start();

$path = "./images/";
$path2 = "./images2/";
$postDetails = '';
if ($_SESSION['post']) {
      $postDetails = $_SESSION['post'];
}
$userId = "";
if ($_SESSION["user_id"]) {
    $userId = $_SESSION["user_id"];
}
$icon = "";
if ($_SESSION["icon"]) {
    $icon = $_SESSION["icon"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./assets/css/style.css">
      <title>Document</title>
</head>

<body>
      <div class="bg-gray2"></div>
      <div class="comment-modal">
            <!-- <div class="close">×</div> -->
            <?php foreach ($postDetails as $postDetail) { ?>
                  <div class="post-comment-container border_none">
                        <form action="./app/controller/DetailController.php" method="post" class="detail-form">
                              <div class="border-left"></div>
                              <div class="flex-left gap3">

                                    <div class="icon-containerDetail">
                                          <?php if ($postDetail["icon"]) { ?>
                                                <img src="<?php echo $path . $postDetail["icon"] ?>" alt="" class="avatar">
                                          <?php } else { ?>
                                                <img src="./assets/img/user-dummy.png" alt="" class="avatar">
                                          <?php } ?>
                                    </div>
                                    <div class="textDetail-container">
                                          <p class="bold"><?php echo $postDetail["name"] ?></p>
                                          <p class="tweet-body"><?= $postDetail["body"] ?></p>
                                    </div>
                              </div>
                              <div class="image-container">
                                    <?php if ($postDetail["image"]) { ?>
                                          <img src="<?php echo $path2 . $postDetail["image"] ?>" alt="" class="your-img">
                                    <?php } ?>
                              </div>
                              <input type="hidden" value ='<?php echo $postDetail['post_id']?>' name="post_id">
                        </form>
                  </div>
                  <!-- <div class="close-tweet">×</div> -->
                  <div class="top flex2">
                        <div class="home">
                              <?php if ($icon) { ?>
                                    <img src="<?php echo $path . $icon ?>" alt="" class="user-icon">
                              <?php } else { ?>
                                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                              <?php } ?>
                        </div>

                        <form action="./app/controller/commentController.php" method="post" class="tweet-form">
                              <textarea type="text" name="comment" class="body-input2" placeholder="Tweet your reply!" rows="4"></textarea>
                              <div class="tweet-btn-container">
                                    <div class="icon" id="icon-upload2">
                                          <i class="far fa-image user"></i>
                                          <input type="file">
                                    </div>
                                    <?//php echo $postDetail['user_id']?>
                                    <input type="hidden" value='<?php echo $postDetail['post_id'] ?>' name="id">
                                    <input type="hidden" value='<?php echo $userId ?>' name="user_id">
                                    <button type="submit" class="tweet-btn2" name="tweet">Tweet</button>
                              </div>

                        </form>
                  </div>
            <?php } ?>
      </div>
</body>

</html>