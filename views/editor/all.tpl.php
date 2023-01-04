<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

<!-- début de la section "main" -->
<?php $this->start('main') ?>

    <div class="container mt-2 mb-4">


        <?php foreach ($allEditors as $editor) :
            $noGameForThisEditor = true;
        ?>

            <h2 class="mt-5"><?= $editor->name; ?></h2>

            <div class="row">

                <?php foreach ($allGames as $game) : ?>
                    <?php if ($game->id_editor === $editor->getId()) :
                        $noGameForThisEditor = false;
                    ?>
                        <?php $this->insert('partials/_game-card.tpl', ['game' => $game]); ?>
                    <?php endif; ?>
                <?php endforeach; ?>


                <?php if ($noGameForThisEditor) : ?>
                    <p>Aucun produit pour cet éditeur</p>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </div>

<?php $this->stop() ?>