<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

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

                        <a href="/product/<?= $product->getId() ?>" class="btn btn-primary">Découvrir</a>
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
    
<?php $this->stop() ?>