<h1>Liste des administrateurs</h1>
<?php if (count($articles) === 0) : ?>
    <h2>Il n'y a pas encore d'admin(s)</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($articles) ?> admin(s) : </h2>

    <?php foreach ($articles as $article) : ?>
    <ul>
        <li>Mail: <?= $article['email'] ?></li>
        <li>Pseudo: <?= $article['pseudo'] ?></li>
    </ul>

    <?php endforeach ?>

<?php endif ?>
