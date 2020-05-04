<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center teal-text text-lighten-2">Commentaires signalés</h1>
            <br><br>
        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>

<?php if (count($signalements) === 0){ ?>
    <h2>Aucun commentaire signalé</h2>
<?php }else{?>
    <h2>Il y a déjà <?= count($signalements) ?> signalement(s) : </h2>
        <table class="striped">
            <thead>
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
            </tr>
            </thead>
                <tbody>
                     <?php foreach ($signalements as $signalement) { ?>
                     <tr>
                    <td><?= $signalement['author'] ?></td>
                    <td><?= $signalement['content'] ?></td>
                    <td><a href="index.php?controller=commentController&task=deleteCommentFlag&id=<?= $signalement['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer le commentaire</a></td>
                    <td><a href="index.php?controller=commentController&task=updateCommentFlag&id=<?= $signalement['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir retirer ce signalement ?!`)">Retirer le signalement</a></td>
                </tr>
        <?php
    }//endforeach
    
}//endelse
 ?>
                </tbody>
        </table>