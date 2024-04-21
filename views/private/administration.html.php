<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administration</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">EX_TI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/?administration">Panel Administration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?disconnect">Se deconnecter</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if(is_string($locations)) : ?>
            <h2 class="text-danger text-center"><?= $locations ?></h2>
        <?php else: ?>
            <div>
                <p><a href="/?addLocation">Ajouter une nouvelle localisation.</a></p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">img_url</th>
                        <th scope="col">adresse</th>
                        <th scope="col">long</th>
                        <th scope="col">lat</th>
                        <th scope="col">modifier</th>
                        <th scope="col">supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($locations as $location) : ?>
                        <tr>
                            <th scope="row"><?= $location['id'] ?></th>
                            <td><?= $location['name'] ?></td>
                            <td><?= $location['img_url'] ?></td>
                            <td><?= $location['adresse'] ?></td>
                            <td><?= $location['long'] ?></td>
                            <td><?= $location['lat'] ?></td>
                            <td class="ps-4"><a href="?update=<?= $location['id'] ?>"><img src="img/update.png" alt="Icone modifier" width="30"></a></td>
                            <td class="ps-4"><a href="?delete=<?= $location['id'] ?>"><img src="img/trash.png" alt="Icone supprimer" width="30"></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>