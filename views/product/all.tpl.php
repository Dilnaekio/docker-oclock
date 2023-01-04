<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

    <div class="container mt-2 mb-4">
        <h1>Tous les jeux</h1>

        <a href="/games/order-by/year">trier par année</a>

        <div class="row">

            <?php foreach ($allGames as $game) : ?>
                <?php $this->insert('partials/_game-card.tpl', ['game' => $game]); ?>
            <?php endforeach; ?>

        </div>

    </div>
    
<?php $this->stop() ?>