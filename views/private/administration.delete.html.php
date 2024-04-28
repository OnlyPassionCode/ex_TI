<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administration Delete</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">EX_TI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" name="name" id="navbarNav">
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
        <?php if(is_string($delete)): ?>
                <h2 class="text-center mb-4 text-danger"><?= $delete ?></h2>
        <?php else: ?>
            <?php if(isset($error)): ?>
                    <h2 class="text-center mb-4 text-danger"><?= $error ?></h2>
            <?php endif; ?>
                <h2 class="text-center mb-4 text-primary">Supprimer la localisation avec comme ID <?= $delete['id'] ?></h2>
                <form class="w-50 m-auto" method="GET">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" disabled value="<?= $delete['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="img_url">Image URL</label>
                        <input type="text" class="form-control" id="img_url" disabled value="<?= $delete['img_url'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" disabled value="<?= $delete['adresse'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="long">Longitude</label>
                        <input type="number" class="form-control" id="long" step="0.0000001" disabled value="<?= $delete['long'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="lat">Latitude</label>
                        <input type="number" class="form-control" id="lat" step="0.0000001" disabled value="<?= $delete['lat'] ?>">
                    </div>
                    <input type="hidden" name="delete" value="<?= $delete['id'] ?>">
                    <div class="">
                        <button type="submit" class="btn btn-danger mt-3" name="ok">Supprimer</button>
                        <button type="submit" class="btn btn-primary mt-3 ms-2" name="ko">Ne pas supprimer</button>
                    </div>
                </form>
        <?php endif ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>