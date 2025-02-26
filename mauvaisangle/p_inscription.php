<?php  
include_once './functions/functions.php';
include_once './database/database.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(
        isset($_POST["username"]) and
        $_POST["username"] != "" and
        isset($_POST["mail"]) and
        $_POST["mail"] != "" and
        isset($_POST["pass"]) and
        $_POST["pass"] != ""
    )
        {
          $username = htmlspecialchars($_POST["username"]);
          $mail = htmlspecialchars($_POST["mail"]);
          $pass = htmlspecialchars($_POST["pass"]); 
           $result = signup($pdo,$username,$mail,$pass);
           if($result){
            header("Location: admin.php");
            }else{
        
            header("Location: inscription.php");
            }
           
        }

    }
else{
    header('Location: index.php');
}

?>

