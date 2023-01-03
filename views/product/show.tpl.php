<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

    <div class="container mt-2 mb-4">
        <h1><?= $this->e($product->title) ?></h1>

        <div class="row mt-5 mb-5">
            <div class="col">
                <img src="/images/products/<?= $this->e($product->image) ?>">
            </div>
            <div class="col">
                <strong>Caractéristiques</strong>
                <table class="table table-stripped">
                    <tr>
                        <td>Catégorie</td>
                        <td><?= $this->e($product->category_name) ?></td>
                    </tr>
                    <tr>
                        <td>Editeur</td>
                        <td><?= $this->e($product->editor_name) ?></td>
                    </tr>
                    <tr>
                        <td>Date de parution</td>
                        <td><?= $this->e($product->date_release) ?></td>
                    </tr>
                    <tr>
                        <td>Age minimum</td>
                        <td><?= $this->e($product->minimum_age) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <p>
        <?= $product->description ?>
        </p>

        <button type="button" class="btn btn-success">Ajouter au panier <?= $this->e($product->price) ?>€</button>

    </div>

<?php $this->stop() ?>