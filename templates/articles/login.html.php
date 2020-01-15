<div class="container">
    <h2 class="blue-text">Se connecter</h2>
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
        <div class="row">
            <form action="index.php?controller=adminController&task=loginAction" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="pseudo" type="text" name="pseudo" class="validate">
                        <label for="pseudo">Pseudo</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="password" type="password" name="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <input class="waves-effect waves-light btn-large" type="submit" value="login" id="submit" name="submit">
            </form>
        </div>

        <a href="index.php?controller=adminController&task=resetPasswordForm"> Mot de passe oublié ? </a>

    </div>

</div>
