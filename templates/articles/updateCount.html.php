<h1>Modifier mon compte</h1>
<?php session_start(); ?>


    <div>
        <form action="index.php?controller=adminController&task=updateMyCount" method="POST">

        <input type='hidden' name='pseudo' value="<?php echo (!empty($_SESSION['pseudo'])) ? $_SESSION['pseudo'] : '';
        ?>">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Modifier" id="submit" name="submit">


    </form>
</div>