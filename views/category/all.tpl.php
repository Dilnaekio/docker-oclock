<!-- ce template hérite du layout principal -->
<?php $this->layout('main-layout.tpl', ['title' => $title]) ?>

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

                        $html .= '<div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
                            <div class="card">
                                <img src="/images/products/'.$game->image.'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$game->title.'</h5>
                                    <div class="mb-2">
                                        <span class="badge bg-success">'.$game->price.' €</span>
                                    </div>
                                    <a href="/product?id='.$game->getId().'" class="btn btn-primary">Découvrir</a>
                                </div>
                            </div>
                        </div>';
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