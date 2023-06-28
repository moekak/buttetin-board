<?php

session_start();


class editModel{
    public $pdo;
   
    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=board', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    public function updateUsername($username,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET username = :username  WHERE id = :id" );
        $statement->bindValue(":username", $username);
        $statement->bindValue(":id", $user_id);
        $statement->execute();

        
      
       
    }
    public function updateIntro($introduction,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET introduction = :introduction WHERE id = :id" );
        $statement->bindValue(":introduction", $introduction);
        $statement->bindValue(":id", $user_id);
        $statement->execute();
    }
    public function updateWeb($web_site,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET  web_site = :web_site WHERE id = :id" );
        $statement->bindValue(":web_site", $web_site);
        $statement->bindValue(":id", $user_id);
        $statement->execute();

        
    }
    public function updateBirthday($birthday,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET  birthday= :birthday WHERE id = :id" );
        $statement->bindValue(":birthday", $birthday);
        $statement->bindValue(":id", $user_id);
        $statement->execute();
    }
    public function updateIcon($icon,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET  icon= :icon WHERE id = :id" );
        $statement->bindValue(":icon", $icon);
        $statement->bindValue(":id", $user_id);
        $statement->execute();

    }
    public function updateCountry($country,$user_id){
        $statement = $this->pdo->prepare("UPDATE `user` SET  country= :country WHERE id = :id" );
        $statement->bindValue(":country", $country);
        $statement->bindValue(":id", $user_id);
        $statement->execute();

    }

}