<?php $this->layout('main-layout.tpl', ['title'=> $title]) ?>


<!-- début du remplissage de la section "main" -->
<?php $this->start('main') ?>

<div class="container mt-2 mb-4">

    <?php 
    foreach ($gamesOrderByYear as $year => $games) :
    ?>

        <h2 class="mt-5"><?= $year ?></h2>

        <div class="row">

            <?php foreach ($games as $game) : ?>
                <?php $this->insert('partials/_game-card.tpl', ['game' => $game, 'urlGenerator' => $urlGenerator]); ?>
            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>

</div>

<!-- fin du remplissage de la section "main" -->
<?php $this->stop() ?>