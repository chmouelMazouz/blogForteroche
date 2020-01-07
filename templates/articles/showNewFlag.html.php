<h1>Commentaires signalés</h1>

<?php if (count($signalements) === 0){ ?>
    <h2>Aucun commentaire signalé</h2>
<?php }else{?>
    <h2>Il y a déjà <?= count($signalements) ?> signalement(s) : </h2>

    <?php foreach ($signalements as $signalement) { ?>
        <h2><?= $signalement['author'] ?></h2>
        <small><?= $signalement['content'] ?></small>
        <a href="index.php?controller=commentController&task=deleteCommentFlag&id=<?= $signalement['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer le commentaire</a>
        <a href="index.php?controller=commentController&task=updateCommentFlag&id=<?= $signalement['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir retirer ce signalement ?!`)">Retirer le signalement</a>

        <?php
    }//endforeach

}//endelse
?>
