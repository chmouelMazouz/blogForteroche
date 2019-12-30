<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center teal-text text-lighten-2">LE blog de Jean Forteroche</h1>
            <div class="row center">
                <h5 class="header col s12 light">Un billet pour l'alaska</h5>
            </div>
            <div class="row center">
                <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
            </div>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>

<div class="container">
    <h1>Nos articles</h1>

    <?php foreach ($articles as $article) : ?>
        <h2><?= $article['title'] ?></h2>
        <small>Ecrit le <?= $article['created_at'] ?></small>
        <p><?= $article['introduction'] ?></p>
        <a href="index.php?controller=articleController&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
        <a href="index.php?controller=articleController&task=update&id=<?= $article['id'] ?>">Modifier</a>
        <a href="index.php?controller=articleController&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
    <?php endforeach ?>
</div>
