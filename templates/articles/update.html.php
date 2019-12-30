
<form action="index.php?controller=articleController&task=updateArticle" method="POST">
    <h3>Modifier l'article</h3>
    <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
    <input type="text" name="title"  value="<?php echo $article['title']; ?>">
    <input type="text" name="slug" value="<?php echo $article['slug']; ?>">
    <input type="text" name="introduction" value="<?php echo $article['introduction']; ?>">
    <textarea name="content" id="" cols="30" rows="10"><?php echo $article['content']; ?></textarea>

    <button>Editer !</button>
</form>