
<form action="index.php?controller=articleController&task=createAction" method="POST">
    <h3>Création article</h3>
    <input type="text" name="title" placeholder="titre de l'article !">
    <input type="text" name="slug" placeholder="slug">
    <input type="text" name="introduction" placeholder="introduction">
    <textarea class="tinymce" name="content" id="" cols="30" rows="10" placeholder="Contenu "></textarea>

    <button>Commenter !</button>
</form>

