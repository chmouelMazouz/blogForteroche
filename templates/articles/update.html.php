<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <h2 class="header center title-article">Modifier l'article</h2>
        </div>
    </div>
    <div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div><br/>
<div class="container">
    <form action="index.php?controller=articleController&task=updateArticle" method="POST">
        <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="slug" value="<?php echo $article['slug']; ?>">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title"  value="<?php echo $article['title']; ?>">
                <label class="active" for="first_name2">Titre de l'article</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="introduction" value="<?php echo $article['introduction']; ?>">
                <label class="active" for="introduction">Introduction</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="content" class="tinymce"  id="contenu" cols="70" rows="10"><?php echo $article['content']; ?></textarea>
                <label class="active" for="contenu">Contenu</label>
            </div>
        </div>
        <button class="waves-effect waves-light btn-large">Editer</button>
    </form>
</div>




