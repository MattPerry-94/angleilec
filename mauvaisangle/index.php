<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mauvais angle - annonces</title>
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
            <?php
            foreach($data as $key => $annonce):?>
            <?php //var_dump($annonce); ?>
              <div class="col-6">
              <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?= $annonce["image"] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $annonce["title"]  ?></h5>
                            <p class="card-text"> <?= $annonce["content"]  ?> </p>
                            <p class="card-text"><small class="text-body-secondary"><?= $annonce["price"]  ?>€</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
              </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>