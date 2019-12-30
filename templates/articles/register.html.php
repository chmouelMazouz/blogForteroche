
<h1>S'inscrire</h1>
<div>
    <form action="index.php?controller=adminController&task=register" method="POST">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="pseudo">Pseudo</label><br>
        <input type="texte" id="pseudo" name="pseudo" required><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
</div>
