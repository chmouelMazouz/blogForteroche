<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br/><br/>
            <h1 class="header center title-style">Liste des billets</h1>
            <div class="row center">
                <h5 class="header col s12 light">Un billet pour l'alaska</h5>
            </div>
            <br/><br/>
        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
    
    <div class="row">
        <?php foreach ($articles as $article) : ?>
        <div class="col s4 m4">
            <div class="card">
                <div class="card-image">
                    <img src="http://www.iter-avocats.fr/wp-content/uploads/2017/10/Default-article-photo.jpg" alt="image-article">
                    <span class="card-title"><?= $article['title'] ?></span>
                </div>
                <div class="card-content">
                    <p><?= substr($article['introduction'], 0, 50) ?>...</p>
                </div>
                <div class="card-action">
                    <a href="index.php?controller=articleController&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                    <?php
                    if (!empty($_SESSION)){
                        if($_SESSION["pseudo"]!="")
                        { ?>
                            <a href="index.php?controller=articleController&task=update&id=<?= $article['id'] ?>">Modifier</a>
                            <a href="index.php?controller=articleController&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                        <?php }} ?>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
