<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oPlaystore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/site.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">oPlaystore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Tous nos jeux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Editeurs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-2 mb-4">
        <h1>OPlaystore</h1>

        <p>
            Nous vous présentons les meilleurs jeux du moment.
        </p>

        <h2>Notre sélection de jeux</h2>

        <div class="row">

        <?php foreach ($allProducts as $product) : ?>

            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <img src="images/products/<?= $product->image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->title ?></h5>

                        <div class="mb-2">
                            <span class="badge bg-success"><?= $product->price ?>€</span>
                        </div>

                        <a href="/product?id=<?= $product->getId() ?>" class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        </div>


        <div class="row">
            <div class="col">
                <div class="home-categorie-editeur p-3">
                    <h2>Les jeux par catégorie</h2>
                    <ul>
                        <?php foreach($allCategories as $category) : ?>
                        <li><a href="/category?id=<?= $category->getId() ?>"><?= $category->name ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>

            <div class="col">
                <div class="home-categorie-editeur p-3">
                    <h2>Les éditeurs de jeu</h2>
                    <ul>
                    <?php foreach($allEditors as $editor) : ?>
                        <li><a href="/editor?id=<?= $editor->getId() ?>"><?= $editor->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>