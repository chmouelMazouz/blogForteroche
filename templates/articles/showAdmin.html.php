<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h3 class="header center ">Les administrateurs</h3>
        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
    <h4>Liste des administrateurs</h4>
    <a class="btn-floating btn-large waves-effect waves-light red" href="index.php?controller=adminController&task=registerAction"><i class="material-icons">add</i></a>
    <?php if (count($articles) === 0) : ?>
        <h5>Il n'y a pas encore d'admin(s)</h5>
    <?php else : ?>
        <h5>Il y a déjà <?= count($articles) ?> admin(s) : </h5>


        <table class="striped">
            <thead>
            <tr>
                <th>Mail</th>
                <th>Pseudo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article['email'] ?></td>
                    <td><?= $article['pseudo'] ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>


    <?php endif ?>
</div>

