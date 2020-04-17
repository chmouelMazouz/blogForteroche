<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h2 class="header center "><?= $article['title'] ?></h2>
        </div>
    </div>
    <div class="parallax"><img src="images/background2.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <h5><?= $article['introduction'] ?></h5>
    <hr>
    <?= $article['content'] ?><br><br>
    <?php if (count($commentaires) === 0) : ?>
        <h4>Aucun commentaire</h4>
    <?php else : ?>
        <h4>Il y a déjà <?= count($commentaires) ?> réactions : <?="<script>localStorage.getItem('author');</script>"?></h4>


        <?php foreach ($commentaires as $commentaire) : ?>
            <h5 id="authorName"><?= $commentaire['author'] ?></h5>
            <small>Le <?= $commentaire['created_at'] ?></small>
        <div id="<?= $commentaire['id']?>" class="row">
            <div class="col s9">
                <pre><?= $commentaire['content'] ?></pre>
            </div>
            <div class="col s3">
                <a class="waves-effect waves-light btn-small" href="index.php?controller=commentController&task=flagComment&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir signaler ce commentaire ?!`)"><i class="material-icons">warning</i></a>
            </div>
            <?php
            if (!empty($_SESSION)){
                if($_SESSION["pseudo"]!=""){
                  echo'<a href=index.php?controller=commentController&task=delete&id=$commentaire[id] onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer le commentaire</a>';

                }
            }
            ?>
        </div>
        <?php endforeach ?>

    <?php endif ?><br>
    <h5>Laisser un commentaire</h5>
    <form action="index.php?controller=commentController&task=insert" id="form" method="POST">
        <input type="text" name="author" id="author" placeholder="Votre pseudo !">
        <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
        <input type="hidden" name="article_id" value="<?=$article['id'] ?>">
        <br/>
        <button class="waves-effect waves-light btn-large">Commenter</button>
        <br/>
    </form>
</div>
<script>
    let form = document.getElementById("form");
    let author=document.getElementById("author");
    let lauthor=localStorage.getItem('author');
    if(lauthor){
        author.value=lauthor;
    }

    form.addEventListener("submit",function(){
        localStorage.setItem('author',author.value);
    });
</script>



