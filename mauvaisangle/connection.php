<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mauvais angle - inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php
      include_once("./functions/functions.php");
      include_once("./database/database.php");
      $data = get_all_annonces($pdo);
      //var_dump($data);
    ?>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center ">Le mauvais angle le site des petites et grandes annonces </h1>
        </div>
        <div class="row mt-5">
            <div class=" offset-4 col-4">
            <form method="POST" action="p_connection.php">
                <div class="mt-3">
                    <label for="mail">Mail :</label>
                    <input type="text" name="mail" id="mail" class="form-control" />
                </div>
                <div class="mt-3">
                    <label for="pass">mot de passe :</label>
                    <input type="password" name="pass" id="mail" class="form-control " />
                </div>
                <input type="submit" name="send" value="s'inscrire" class="btn btn-primary mt-3"/>
            </form>
            </div>
            
        </div>
    </div>
</body>
</html>