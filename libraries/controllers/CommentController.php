<?php
namespace Controllers;
use Models\AdminModel;
use Models\CommentModel;

class CommentController extends Controller
{

    protected $modelName = \Models\CommentModel::class;

    public function insert()
    {
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }
        $content = null;
        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
        }
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
            
        }
        if (!$author || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $this->model->insert($author, $content, $article_id);
        \Http::redirect("index.php?controller=articleController&task=show&id=" . $article_id);
    }
    
    public function delete()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }
        $id = $_GET['id'];
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        $article_id = $commentaire['article_id'];
        $this->model->delete($id);
        \Http::redirect("index.php?controller=articleController&task=show&id=" . $article_id);
    }


    public function flagComment()
    {
        $flag = 0;
        $id = ($_GET['id']);
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            $flag = 0;
            die("Ho ! Fallait préciser le paramètre id en GET !");
        } else {
            $flag = 1;
            $this->model->flagComment($flag, $id);
        }
    }

    public function findAllFlag()
    {
        $signalements = $this->model->findAllFlag();
        \Renderer::render('articles/showFlag', compact('signalements'));
    }

    public function deleteCommentFlag()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }
        $id = $_GET['id'];
        $signalements = $this->model->find($id);
        if (!$signalements) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        $this->model->delete($id);
        \Http::redirect("index.php?controller=commentController&task=findAllFlag");
    }

    public function updateCommentFlag()
    {
        $id = ($_GET['id']);
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        } else {
            $flag = false;
            $this->model->flagComment($flag, $id);
        }
        \Http::redirect("index.php?controller=commentController&task=findAllFlag");
    }

    public function contact (){
        \Renderer::render('articles/contactForm');
    }

public function contactAction (){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $to = 'chmouelmazouz@gmail.com';
    $subject ="Nouveau message :" . $title;
    $message = "Vous avez reçu un nouveau message : " . $content ;
    $headers = 'from: chmouelmazouz@gmail.com';
    $this->sendMail($to, $subject, $message);
    \Renderer::render('articles/contactConfirm');
    }

    public function sendMail($to,$subject,$message){
        mail($to, $subject, $message);
    }
}

