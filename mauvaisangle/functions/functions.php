<?php
session_start();

function signup(PDO $pdo,string $username,string $mail,string $pass){

    $hachedPass = password_hash($pass,PASSWORD_DEFAULT);
    $sql_request = "INSERT INTO users (username,mail,pass) VALUES(?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);
    
 
    $result = $prepareStatement->execute([$username,$mail,$hachedPass]);
    //var_dump($result);
    if($result){
        $lastId = $pdo->lastInsertId();
        $user = get_user_by_id($pdo,$lastId);
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["mail"] = $user["mail"];
    }
    
    return $result;
      
 }

 function signin($pdo,$mail,$pass){
    
    $user = get_user_by_mail($pdo, $mail);
    if(password_verify($pass,$user["pass"])){
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["mail"] = $user["mail"];
        return true;
    }
    return null;  

 }

 function get_user_by_mail(PDO $pdo,string $mail){
    $sql_request = "SELECT * FROM users WHERE mail = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$mail])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data ?: null; // Retourne null si aucun utilisateur trouvé
    }

    return null;
 }

 function get_user_by_id(PDO $pdo,string $id){

    $sql_request = "SELECT * FROM users WHERE id = ?";
    $prepareStatement  = $pdo->prepare($sql_request);

    if ($prepareStatement->execute([$id])) {
        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data ?: null; // Retourne null si aucun utilisateur trouvé
    }

    return null;
 }

function get_all_annonces(PDO $pdo) :array
{
   
    // requête sql
    $sql_query = "SELECT * FROM annonces";
    // utilisation du statement pour la requete
    $statement =  $pdo->query($sql_query);

    //execution de la requête 
     return $data = $statement->fetchAll();
   

}
function get_all_annonces_by_user_id(PDO $pdo, int $id) :array
{
   
    // requête sql
    $sql_request = "SELECT * FROM annonces WHERE user_id = ?";
    $prepareStatement =  $pdo->prepare($sql_request);
    $prepareStatement =  execute([$id]);

    //execution de la requête 
     return $data = $prepareStatement->fetchAll();
   

}

function get_one_annonce(PDO $pdo,int $id){

    $sql_request = "SELECT * FROM annonces WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);

    if($prepareStatement->execute([$id])) {

        $data = $prepareStatement->fetch(PDO::FETCH_ASSOC);
        return $data;

    }else{

        return null;
    }
}

function create_annonce(PDO $pdo, string $title, string $content, string $image, float $price,){
    $user_id = $_SESSION["id"];
    $sql_request = "INSERT INTO annonces (title,content,image,price,user_id) VALUES(?,?,?,?,?)";
    $prepareStatement = $pdo->prepare($sql_request);

    $result = $prepareStatement->execute([$title,$content,$image,$price,$user_id]);

    return $result;
    

}

function delete_annonce(PDO $pdo, int $annonce_id):bool
{
    $user_id = $_SESSION["id"];
    $sql_request = "DELETE FROM annonces WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$annonce_id]);
    return $result;
}
function update_annonce(PDO $pdo, int $id, string $title, string $content, string $image, float $price){
    $sql_request = "UPDATE annonces SET title =?, content, =?, image =?, price =?, WHERE id =?";
    $prepareStatement = $pdo->prepare($sql_request);
    $result = $prepareStatement->execute([$title,$content,$image,$price,$id]);
    return $result;
}

function session_verify(){
    if(isset($_SESSION["username"]) && empty($_SESSION["username"]) ){
        header('Location: index.php');
    }
}

