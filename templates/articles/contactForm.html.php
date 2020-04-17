<div id="index-banner" class="parallax-container">
<div class="section no-pad-bot">
    <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Formulaire de contact</h1>

        <br><br>
    </div>
</div>
<div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>



<div class="container">
<form action="index.php?controller=commentController&task=contactAction" method="POST">
    <h3>Formulaire</h3>
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" placeholder="titre du message !">
        </div>
            <div class="input-field col s12">
                <textarea name="content" id="" cols="300" rows="250" placeholder="Contenu du message"></textarea>
            </div>
        </div>
    <input class="waves-effect waves-light btn-large" type="submit" value="contacter" id="submit" name="submit>
</form>
</div>
