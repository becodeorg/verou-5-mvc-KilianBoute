<?php require 'View/includes/header.php' ?>

<?php // Use any data loaded in the controller here 
?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <?php if ((int)$article->getId() - 1 <= 0) { ?>
        <span class="disabled">Previous article</span>
    <?php } else { ?>
        <a href="index.php?page=show-article&id=<?= (int)$article->getId() - 1 ?>">Previous article</a>
    <?php } ?>
    <?php if ((int)$article->getId() + 1 > count($articles)) { ?>
        <span class="disabled">Next article</span>
    <?php } else { ?>
        <a href="index.php?page=show-article&id=<?= (int)$article->getId() + 1 ?>">Next article</a>
    <?php } ?>
</section>


<?php require 'View/includes/footer.php' ?>