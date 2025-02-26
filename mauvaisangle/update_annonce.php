<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modification d'annonces</title>
</head>
<body>
    <?php
    include_once './functions/functions.php';
    include_once './database/database.php';
    session_verify();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["id"]) and
        !empty($_POST["id"]) ){
            $id = $_POST["id"];
            $annonce = get_one_annonce($pdo, $id);
            if($annonce == null){
                header("Location: admin.php");
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="p_update_annonce.php" method="POST">
                    <div class="mt-3">
                        <input type="hiden" value="<?= $annonce["id"]?>" class="form-control" type="text" id="id" name="title" placeholder="Mon annonce" required>
                    </div>
                    <div class ="mt-3">
                        <label for="image">Image annonce</label>
                        <input value="<?= $annonce["image"] ?>" class="form-control" type="text" id="image" name="image" placeholder="photo.jpg" required>
                    </div>
                    <div class="mt-3">
                        <label for="content">Contenu annonce</label>
                        <textarea class="form-control" name="content" id="content" placeholder="mon annonce..." required>
                            <?= $annonce["content"] ?>
                        </textarea> 
                    </div>
                    <div class="mt-3">
                        <label for="price">Prix</label>
                        <input  value="<?=$annonce["price"] ?>" class="form-control" type="number" id="price" name="price" placeholder="250" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
