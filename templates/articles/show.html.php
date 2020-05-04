<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <h2 class="header center title-article"><?= $article['title'] ?></h2>
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
        <?php foreach ($commentaires as $commentaire) : 
        ?>
            <h5 id="authorName"><?= $commentaire['author'] ?></h5>
            <small>Le <?= $commentaire['created_at'] ?></small>
            <div id="<?= $commentaire['id']?>" class="row">
                <div class="col s9">
                    <pre><?= $commentaire['content'] ?></pre>
                </div>
                <?php
                if ($commentaire['flag']==1){
                   echo '<button class="waves-effect waves-light btn red"><i class="material-icons">block</i>Commentaire signalé</button>';
                    }
                else{
                ?>
                <div class="col s3">
                    <button class="waves-effect waves-light btn-small"  id="<?= $commentaire['id']?>" onClick="reply_click(this.id)"><i class="material-icons">warning</i></button>
                </div>
                <?php
                    }
                if ($_SESSION['pseudo']){
                    echo'<a href=index.php?controller=commentController&task=delete&id=$commentaire[id] onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer le commentaire</a>';
                }
                ?>
            </div>
        <?php endforeach ?>

    <?php endif ?><br>
    <h5>Laisser un commentaire</h5>
    <form action="index.php?controller=commentController&task=insert" id="form" method="POST">
        <input type="text" name="author" id="author" placeholder="Votre pseudo !">
        <textarea name="content" class="materialize-textarea" id="comment-id" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
        <input type="hidden" name="article_id" value="<?=$article['id'] ?>">
        <br/>
        <button class="waves-effect waves-light btn-large">Commenter</button>
        <br/>
    </form>
</div>
<script>
    function reply_click(clicked_id)
    {
        let id=clicked_id;
        document.getElementById(id).addEventListener("click", (e)=>{
            e.preventDefault();
            confirm("ëtes vous sûr de signaler ce commentaire?");
            fetch('index.php?controller=commentController&task=flagComment&id='+id,{
                method:'GET',
            }).then(checkStatus)
                .catch((error)=>{
                    console.error('request failed', error);
                })
        })
        function checkStatus(response) {
            if (response.status >=200 && response.status <300){
                location.reload();
            }
        }
    }
</script>