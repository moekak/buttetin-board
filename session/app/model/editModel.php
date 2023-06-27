<?php


class editModel{
    public $pdo;
   
    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    public function update($username, $introduction, $web_site, $birthday){
        $statement = $this->pdo->prepare("UPDATE `user` SET username = :username,  introduction = :introduction, web_site = :web_site, birthday= :birthday WHERE id = :id" );
        $statement->bindValue(":username", $username);
        $statement->bindValue(":introduction", $introduction);
        $statement->bindValue(":web_site", $web_site);
        $statement->bindValue(":birthday", $birthday);
        $statement->execute();
    }
}