<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h3 class="header center ">Inscription</h3>
        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
<h4>S'inscrire</h4>
<div>
    <form action="index.php?controller=adminController&task=register" method="POST">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="pseudo">Pseudo</label><br>
        <input type="texte" id="pseudo" name="pseudo" required><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password" required><br>
        <input class="waves-effect waves-light btn-large" type="submit" value="Inscription" id="submit" name="submit">
    </form>
</div>
</div>
