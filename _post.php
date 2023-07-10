<?php
 session_start();
 

   
    
  
 
    $user_id = "";

    $title = "";
    $body = "";
    $date = "";
    $error_title = "";
    $error_body = "";
    $user = "";
    

    if(isset($_POST["submit"])){

        if($_POST["title"]){
            $title = $_POST["title"];
        } else{
            $error_title= "title is required";
        }
        if($_POST["body"]){
            $body = $_POST["body"];
        } else{
            $error_body = "body is required";
        }

    
        $date = date('Y-m-d H:i:s');

    
      

      
    }
    if(!$error_body && !$error_title &&  isset($_POST["submit"])){ 
        if(isset($_SESSION["user_id"])){
            $user_id = $_SESSION["user_id"];
         
        } 
     
        $statement =$pdo->prepare("INSERT INTO `board-table` (`title`, `body`, `date`, `user_id`) VALUES (:title, :body, :date, :user_id)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':user_id', $user_id);
   
        
        $statement->execute();

        header("Location: index.php");


        
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/post.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="title">
            <h1>What's up John</h1>
        </div>
        <form action="./app/controller/controller.php" method="post">
          
            <?php if(!$error_title){?>
                <div class="mb-5">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" placeholder="write title here" name="title">
                </div>
            <?php } else {?>
                <div class="mb-5">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control is-invalid" placeholder="write title here" name="title">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        This field is required
                    </div>
                </div>

            <?php }?>
            <?php if(!$error_body){?>
                <div class="mb-5">
                    <label for="exampleFormControlTextarea1" class="form-label">body</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                </div>
            <?php } else{?>
                <div class="mb-5">
                    <label for="exampleFormControlTextarea1" class="form-label">body</label>
                    <textarea class="form-control  is-invalid" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        This field is requiured.
                    </div>
                </div>
               
            <?php }?>

                <div class="mb-5">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
            <a href="index.php"><button type="button" class="btn btn-secondary">return</button></a>
        </form>
    </main>


</body>

</html>