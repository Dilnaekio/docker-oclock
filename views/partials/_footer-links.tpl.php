<div class="row">
    <div class="col">
        <div class="home-categorie-editeur p-3">
            <h2>Les jeux par catégorie</h2>
            <ul>
                <?php foreach($allCategories as $category) : ?>
                <li><a href="<?= $urlGenerator->generate('category', ['id' => $category->getId()] ); ?>"><?= $category->name ?></a></li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

    <div class="col">
        <div class="home-categorie-editeur p-3">
            <h2>Les éditeurs de jeu</h2>
            <ul>
            <?php foreach($allEditors as $editor) : ?>
                <li><a href="<?= $urlGenerator->generate('editor', ['id' => $editor->getId()] ); ?>"><?= $editor->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>