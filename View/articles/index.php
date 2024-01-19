<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 

?>

<section>
    <h1>Articles</h1>
    <ul>

        <?php foreach ($articles as $article) : ?>
            <li><a href="index.php?page=show-article&id=<?= $article->getId() ?>"><?= $article->title ?> <?= $article->formatPublishDate() ?></a></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php' ?>