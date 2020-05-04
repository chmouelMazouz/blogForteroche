<?php
namespace Controllers;

class ArticleController extends Controller {
   protected $modelName = \Models\ArticleModel::class;

    public function index()
        //Montrer la liste
    {
        session_start();
        $articles = $this->model->findLast("created_at DESC LIMIT 3");
        $pageTitle = "Accueil";
        \Renderer::render('articles/index',compact('pageTitle','articles'));
    }

    public function indexArticle(){
        session_start();
        $articles = $this->model->findAll("created_at DESC");
        $pageTitle = "liste des billets";
        \Renderer::render('articles/showAllArticle',compact('pageTitle','articles'));

    }

    public function show()
        //Montrer un article
    {
        $commentModel = new \Models\CommentModel();
        $article_id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }
        $article = $this->model->find($article_id);
        $commentaires = $commentModel->findAllWithArticle($article_id);
        $pageTitle = $article['title'];
        \Renderer::render('articles/show', compact('pageTitle','article','commentaires','$article_id'));
    }

    public function delete()
        //Supprimer un article
    {
        
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
        $article = $this->model->find($id);
        if (!$article) {
         die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        $this->model->delete($id);
        \Http::redirect('index.php');
    }
    public function create(){
        \Renderer::render('articles/create');
    }

    public function createAction(){

        $title = '';
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }
        $introduction = '';
        if (!empty($_POST['introduction'])) {
            $introduction= $_POST['introduction'];
        }
        $content = '';
        if (!empty($_POST['content'])) {
            $content =$_POST['content'];
        }
        $this->model->insertArticle($title, $introduction, $content);
        \Http::redirect('index.php');
    }

    public function update(){
        session_start();
        if ($_SESSION['pseudo']!= ''){
            $id = null;
                if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
                     $id = $_GET['id'];
            }

            $article = $this->model->find($id);
            \Renderer::render('articles/update', compact('article'));
        }else {
            \Renderer::render('articles/login');
        }
    }

    function updateArticle(){

        $title = '';
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }
        $introduction = null;
        if (!empty($_POST['introduction'])) {
            $introduction= $_POST['introduction'];
        }
        $content = null;
        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
        }
        $slug= null;
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }

        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        $this->model->updateArticle($title, $introduction, $content,$id);
        \Renderer::render('articles/confirmUpdateArticle');

    }

    function biographie(){
        \Renderer::render('articles/biographie');
    }
    }