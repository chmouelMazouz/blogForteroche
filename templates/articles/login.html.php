
<h1>Se connecter</h1>
<div>
    <?php if(isset($_GET["connect"]) && $_GET["connect"] == "false"){
        ?>
    <div style="background: red; color: white">
        <p>
            Identifiant ou mot de passe incorrect
        </p>
    </div>
    <?php
    }
    ?>
    <?php if(isset($_GET["ident"]) && $_GET["ident"] == "empty"){
        ?>
        <div style="background: red; color: white">
            <p>merci de saisir votre identifiant mot de passe

            </p>
        </div>
        <?php
    }
    ?>

    <form action="index.php?controller=adminController&task=loginAction" method="POST">
        <label for="pseudo">Pseudo</label><br>
        <input type="texte" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="login" id="submit" name="submit">
    </form>
    <p>Mot de passe oublié?</p>
    <input href=""type="submit" value="reset" id="submit" name="submit">

</div>
