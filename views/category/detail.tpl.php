<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

    <div class="container mt-2 mb-4">
        <h1><?= $category->name; ?></h1>


        <div class="row">

            <?php foreach ($allGames as $game) : ?>
                <?php $this->insert('partials/_game-card.tpl', ['game' => $game, 'urlGenerator' => $urlGenerator]); ?>
            <?php endforeach; ?>

            <?php if (count($allGames) == 0) : ?>
                <p>Aucun produit dans cette catégorie</p>
            <?php endif; ?>

        </div>
    </div>

    <?php $this->insert('partials/_footer-links.tpl', ["allEditors" => $allEditors, "allCategories" => $allCategories, 'urlGenerator' => $urlGenerator]) ?>

<?php $this->stop() ?>
