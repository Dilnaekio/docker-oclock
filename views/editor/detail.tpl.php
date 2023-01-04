<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

<div class="container mt-2 mb-4">

<div class="container mt-2 mb-4">
        <h1><?= $editor->name; ?></h1>
        <p><?= $editor->presentation; ?></p>


        <div class="row">

            <?php foreach ($games as $game) : ?>
                <?php $this->insert('partials/_game-card.tpl', ['game' => $game]); ?>
            <?php endforeach; ?>


            <?php if (count($games) == 0) : ?>
                <p>Aucun produit dans cette catégorie</p>
            <?php endif; ?>

        </div>
    </div>

<?php $this->stop(); ?>