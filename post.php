<?php
    /** @var $pdo \PDO */
    require_once "DB.php";


    $title = "";
    $body = "";

    if(isset($_POST["submit"])){
        if($_POST["title"]){
            $title = $_POST["title"];
        }
    
       
        if($_POST["body"]){
            $body = $_POST["body"];
        }
    
    }
   
    echo $title

   


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="title">
            <h1>What's up John</h1>
        </div>
        <form action="" method="post">
            <div class="mb-5">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="write title here" name="title">
            </div>
            <div class="mb-5">
                <label for="exampleFormControlTextarea1" class="form-label">body</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
            </div>
            <div class="mb-5">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
        </form>
    </main>


</body>

</html>