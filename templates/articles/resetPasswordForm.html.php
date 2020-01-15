<h1>Réinitialisation de votre mot de passe </h1>
<form action="index.php?controller=adminController&task=newPasswordByMail" method="POST">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Réinitialiser" id="submit" name="submit">
</form>