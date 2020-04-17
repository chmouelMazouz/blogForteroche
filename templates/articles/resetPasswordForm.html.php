<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center ">Réinitialisation du mot de passe</h1>

        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
<h4>Saisir votre mail pour recevoir votre nouveau mot de passe </h4>
<form action="index.php?controller=adminController&task=newPasswordByMail" method="POST">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>
    <button class="waves-effect waves-light btn-large" type="submit" value="Réinitialiser" id="submit" name="submit">Envoyer</button>
</form>
</div>