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

        <?php foreach ($allProducts as $game) : ?>

            <?php $this->insert('partials/_game-card.tpl', ['game' => $game, 'urlGenerator' => $urlGenerator]); ?>

        <?php endforeach; ?>

        </div>

        <?php $this->insert('partials/_footer-links.tpl', ["allEditors" => $allEditors, "allCategories" => $allCategories, 'urlGenerator' => $urlGenerator]) ?>

    </div>
    
<?php $this->stop() ?>