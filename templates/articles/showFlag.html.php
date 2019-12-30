<h1>Commentaires signalés</h1>

<?php if (count($signalements) === 0){ ?>
    <h2>Aucun commentaire signalé</h2>
<?php }else{?>
    <?php foreach ($signalements as $signalement) { ?>
        <h2><?= $signalement['author'] ?></h2>
        <small><?= $signalement['content'] ?></small>

        <?php
    }//endforeach

}//endelse
 ?>
