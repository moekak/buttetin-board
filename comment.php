<?php





$path = "./images/";
$path2 = "./images2/";
$postDetails = '';
if ($_SESSION['post']) {
      $postDetails = $_SESSION['post'];
}


?>





      <div class="comment-modal">
            <!-- <div class="close">×</div> -->
            <?php foreach ($postDetails as $postDetail) { ?>
                  <div class="post-comment-container border_none">
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


                  </div>
                  <!-- <div class="close-tweet">×</div> -->
                  <div class="top">
                        <div class="home">
                              <?php if ($postDetail['icon']) { ?>
                                    <img src="<?php echo $path . $postDetail['icon']?>" alt="" class="user-icon">
                              <?php } else { ?>
                                    <img src="./assets/img/user-dummy.png" alt="" class="user-icon">
                              <?php } ?>
                        </div>

                        <form action="./app/controller/controller.php" method="post" enctype="multipart/form-data" class="tweet-form">
                              <textarea type="text" name="body" class="body-input2" placeholder="What is happening?!" rows="4"></textarea>
                              <img id="displayImage2" src="#" alt="your image" style="display:none;" class="your-img">
                              <div class="tweet-btn-container">
                                    <div class="icon" id="icon-upload2">
                                          <i class="far fa-image user"></i>
                                          <input type="file" name="image">
                                    </div>
                                    <button type="submit" class="tweet-btn2">Tweet</button>
                              </div>

                        </form>
                  </div>
            <?php } ?>
      </div>

