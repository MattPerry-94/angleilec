<?php  
include_once './functions/functions.php';
include_once './database/database.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(
        isset($_POST["title"]) and
        !empty($_POST["title"]) and
        isset($_POST["image"]) and
        !empty($_POST["image"]) and
        isset($_POST["content"]) and
        !empty($_POST["content"]) and 
        isset($_POST["price"]) and
        !empty($_POST["price"])
    ){
        
        
        $title = htmlspecialchars($_POST["title"]);
        $image = htmlspecialchars($_POST["image"]);
        $content = htmlspecialchars($_POST["content"]);
        $price = htmlspecialchars($_POST["price"]);

        $result = create_annonce($pdo, $title, $content, $image, $price);
         
    
    
    
    }

    header('Location: admin.php');
}


    


