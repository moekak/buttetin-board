<?php
    /** @var $pdo \PDO */
    require_once "DB.php";

    $id="";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }

    $statement = $pdo->prepare("DELETE FROM `board-table` WHERE `board-table`.`id` = :id");
    $statement->bindValue(":id", $id);
    $statement->execute();
    header("Location: index.php");

    
    