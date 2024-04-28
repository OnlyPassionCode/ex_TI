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
        <?php if(isset($_GET['updateOK'])) : ?>
            <h2 class="text-center mb-4 text-success">La location avec comme ID <strong class="text-primary"><?=$_GET['updateOK']?></strong> a bien été modifié.</h2>
        <?php endif ?>
        <?php if(isset($_GET['deleteOK'])) : ?>
            <h2 class="text-center mb-4 text-success">La location avec comme ID <strong class="text-primary"><?=$_GET['deleteOK']?></strong> a bien été <strong class="text-danger">supprimé</strong>.</h2>
        <?php endif ?>
        <?php if(isset($_GET['deleteKO'])) : ?>
            <h2 class="text-center mb-4 text-success">La location avec comme ID <strong class="text-primary"><?=$_GET['deleteKO']?></strong> <strong class="text-danger">n'a pas</strong> été supprimé.</h2>
        <?php endif ?>
        <?php if(isset($_GET['addOK'])) : ?>
            <h2 class="text-center mb-4 text-success">La location avec comme ID <strong class="text-primary"><?=$_GET['addOK']?></strong> a bien été crée.</h2>
        <?php endif ?>
        <?php if(is_string($locations)) : ?>
            <h2 class="text-danger text-center"><?= $locations ?></h2>
        <?php else: ?>
            <div class="mb-2">
                <a href="?addLocation">
                    <button type="button" class="btn btn-success">
                        <svg style="position:relative; top: -1px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add me-1" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"></path>
                            <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"></path>
                        </svg>
                        Ajouter Location
                    </button>
                </a>
            </div>
            <table class="table table-striped table-hover">
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