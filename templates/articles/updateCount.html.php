<div id="index-banner" class="parallax-container parallax-header">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h3 class="header center ">Modification du compte</h3>

        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="container">
<h4>Modifier mon mot de passe</h4>
<?php session_start(); ?>


    <div>
        <form action="index.php?controller=adminController&task=updateMyCount" method="POST">

        <input type='hidden' name='pseudo' value="<?php echo (!empty($_SESSION['pseudo'])) ? $_SESSION['pseudo'] : '';
        ?>">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password" required><br>
        <input  class="waves-effect waves-light btn-large" type="submit" value="Modifier" id="submit" name="submit">
    </form>
</div>
</div><br>