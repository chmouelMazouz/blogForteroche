<div id="index-banner" class="parallax-container">
<div class="section no-pad-bot">
    <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Modifier l'article</h1>
        <br><br>
    </div>
</div>
<div class="parallax"><img src="images/background1.jpg" alt="Unsplashed background img 1"></div>
</div>

<form action="index.php?controller=articleController&task=updateArticle" method="POST">
    <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
    <input type="text" name="title"  value="<?php echo $article['title']; ?>">
    <input type="text" name="slug" value="<?php echo $article['slug']; ?>">
    <input type="text" name="introduction" value="<?php echo $article['introduction']; ?>">
    <textarea name="content" id="" cols="30" rows="10"><?php echo $article['content']; ?></textarea>

    <button class="waves-effect waves-light btn-large">Editer</button>
</form><br>

