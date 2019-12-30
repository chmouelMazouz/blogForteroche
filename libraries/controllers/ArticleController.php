<?php
namespace Controllers;

class ArticleController extends Controller {
   protected $modelName = \Models\ArticleModel::class;

    public function index()
        //Montrer la liste
    {
        /**
         * 2. Récupération des articles
         */
// On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
//$resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
// On fouille le résultat pour en extraire les données réelles
        $articles = $this->model->findAll("created_at DESC");
        /**
         * 3. Affichage
         */
        $pageTitle = "Accueil";
        \Renderer::render('articles/index',compact('pageTitle','articles'));
    }

    public function show()
        //Montrer un article
    {
        $commentModel = new \Models\CommentModel();
        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
// On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

// On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }
        /**
         * 3. Récupération de l'article en question
         * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
         * jamais confiance à ce connard d'utilisateur ! :D
         */
        $article = $this->model->find($article_id);
        /**
         * 4. Récupération des commentaires de l'article en question
         * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
         */
        $commentaires = $commentModel->findAllWithArticle($article_id);

        /**
         * 5. On affiche
         */
        $pageTitle = $article['title'];
        \Renderer::render('articles/show', compact('pageTitle','article','commentaires','$article_id'));
    }

    public function delete()
        //Supprimer un article
    {
        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
        /**
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil
         */
        \Http::redirect('index.php');
    }
    public function create(){
        \Renderer::render('articles/create');
    }

    public function createAction(){

        $title = null;
        if (!empty($_POST['title'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $title = htmlspecialchars($_POST['title']);
        }
        $introduction = null;
        if (!empty($_POST['introduction'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $introduction= htmlspecialchars($_POST['introduction']);
        }
        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }
        $slug= null;
        if (!empty($_POST['slug'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $slug = htmlspecialchars($_POST['slug']);
        }

        $this->model->insertArticle($title, $slug, $introduction, $content);
        \Http::redirect('index.php');

    }

    public function update(){
        session_start();
        if ($_SESSION['pseudo']!= ''){
            // On part du principe qu'on ne possède pas de param "id"
            $id = null;

            // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
            if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                $id = $_GET['id'];
            }

            $article = $this->model->find($id);

            \Renderer::render('articles/update', compact('article'));
        }else {
            \Http::redirect('login.php');

        }


    }

    function updateArticle(){

        $title = '';
        if (!empty($_POST['title'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $title = htmlspecialchars($_POST['title']);
        }
        $introduction = null;
        if (!empty($_POST['introduction'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $introduction= htmlspecialchars($_POST['introduction']);
        }
        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }
        $slug= null;
        if (!empty($_POST['slug'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $slug = htmlspecialchars($_POST['slug']);
        }

        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        $this->model->updateArticle($title, $slug, $introduction, $content,$id);
        \Http::redirect('index.php');
    }


}