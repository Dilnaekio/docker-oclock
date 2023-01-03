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

        <?php $this->insert('partials/_footer-links.tpl', ["allEditors" => $allEditors, "allCategories" => $allCategories]) ?>

    </div>
    
<?php $this->stop() ?>