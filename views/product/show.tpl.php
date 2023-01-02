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
            <a class="navbar-brand" href="#">oPlaystore</a>
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
        <h1><?= $product->title ?></h1>

        <div class="row mt-5 mb-5">
            <div class="col">
                <img src="images/products/<?= $product->image ?>">
            </div>
            <div class="col">
                <strong>Caractéristiques</strong>
                <table class="table table-stripped">
                    <tr>
                        <td>Catégorie</td>
                        <td><?= $product->category_name ?></td>
                    </tr>
                    <tr>
                        <td>Editeur</td>
                        <td><?= $product->editor_name ?></td>
                    </tr>
                    <tr>
                        <td>Date de parution</td>
                        <td><?= $product->date_release ?></td>
                    </tr>
                    <tr>
                        <td>Age minimum</td>
                        <td><?= $product->minimum_age ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <p>
        <?= $product->description ?>
        </p>

        <button type="button" class="btn btn-success">Ajouter au panier <?= $product->price ?>€</button>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>