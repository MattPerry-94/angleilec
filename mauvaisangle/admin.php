<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administration des documents</title>
<body>
    <?php 
    include_once("./functions/functions.php");
    include_once("./database/database.php");
    session_verify(); ?>
    <?php $id_user = $_SESSION["id"];?>
    <?php $annonces = get_all_annonces_user_by_id($pdo,$id_user); ?>
    <div class="container">
        <div class="row">
            <div class="col-11">
                <h1 class="text-center">Administration des annonces</h1>
            </div>
            <div class="col-1">
                <p> <?= $_SESSION["username"]; ?>  </p>
            </div>
            <div class="row">
                <div class="col-6">
                    <form action="p_add_annonce.php" method="POST">
                        <div class="mt-3">
                            <label for="title">Titre annonce</label>
                            <input class="form-control" type="text" id="title" name="title" placeholder="Mon annonce" required>
                        </div>
                        <div class ="mt-3">
                            <label for="image">Image annonce</label>
                            <input class="form-control" type="text" id="image" name="image" placeholder="photo.jpg" required>
                        </div>
                        <div class="mt-3">
                            <label for="content">Contenu annonce</label>
                            <textarea class="form-control" name="content" id="content" placeholder="" required></textarea> 
                        </div>
                        <div class="mt-3">
                            <label for="price">Prix</label>
                            <input class="form-control" type="number" id="price" name="price" placeholder="250" required>
                        </div>
                        <div class="mt-3">
                            <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">titre</th>
                                <th scope="col">supprimer</th>
                                <th scope="col">modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($annonces as $annonce):?>
                            <tr>
                                <td><?= $annonce["title"] ?></td>
                                <td>
                                    <form method="POST" action="p_delete_annonce.php">
                                        <input type="hidden" name="id" value="<?= $annonce["id"]?>">
                                        <button type="submit" name="submit" class=" btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="update_annonce.php">
                                        <input type="hidden" name="id" value="<?= $annonce["id"]?>">
                                        <button type="submit" name="submit" class=" btn btn-warning">Modifier</button>
                                    </form>

                                </td>
                                
                            </tr>
                            <?php endforeach ; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>