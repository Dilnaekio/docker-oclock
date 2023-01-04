<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>
<!-- Ce template doit transmettre la valeur stockée dans $title au layout -->

<!-- début de la section "main" -->
<?php $this->start('main') ?>

    <div class="container mt-2 mb-4">

        <?php foreach ($allCategories as $category) :
            $html = '';
            $title = '<h2 class="mt-5">'.$category->name.'</h2>';
            ?>

            <div class="row">

                <?php foreach ($allGames as $game) : ?>
                    <?php if ($game->id_category === $category->getId()) :

                        // on met en mémoire tampon tous les affichages
                        ob_start();
                        $this->insert('partials/_game-card.tpl', ['game' => $game]);
                        // on récupère ce qu'il y a dans la mémoire tampon, on le stocke dans $html et on vide la mémoire tampon
                        $html .= ob_get_clean();
                    endif; ?>
                <?php endforeach; ?>


                <?php if ($html != '') : 

                    echo $title;
                    echo $html;

                endif; ?>

            </div>
        <?php endforeach; ?>

    </div>
<?php $this->stop() ?>