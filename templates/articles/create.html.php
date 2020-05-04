
<div class="container">
    <form action="index.php?controller=articleController&task=createAction" method="POST">
        <h3>Création article</h3>
        <div class="row">
            <div class="input-field col s12">
                 <input type="text" name="title" placeholder="titre de l'article !">
            </div>
            <div class="input-field col s12">
            <input type="text" name="introduction" placeholder="introduction">
            </div>
            <div class="input-field col s12">
                <textarea class="tinymce" name="content" id="" cols="20" rows="10" placeholder="Contenu "></textarea>
            </div>    
            <button class="waves-effect waves-light btn-large">Editer</button>
        </div>
    </form>
</div>


