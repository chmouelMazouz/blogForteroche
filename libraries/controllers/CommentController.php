<?php
namespace Controllers;
use Models\CommentModel;

class CommentController extends Controller
{

    protected $modelName = \Models\CommentModel::class;


    public function insert()
    {

        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
// On commence par l'author
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

// Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }

// Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$author || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $article = $this->model->find($article_id);

// Si rien n'est revenu, on fait une erreur
        if (!$article) {
            die("Ho ! L'article $article_id n'existe pas boloss !");
        }

// 3. Insertion du commentaire
        $this->model->insert($author, $content, $article_id);

// 4. Redirection vers l'article en question :
        \Http::redirect("index.php?controller=articleController&task=show&id=" . $article_id);
    }


    public function delete()
    {

        /**
         * 1. Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification de l'existence du commentaire
         */
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        $article_id = $commentaire['article_id'];
        $this->model->delete($id);
        /**
         * 5. Redirection vers l'article en question
         */

        \Http::redirect("index.php?controller=articleController&task=show&id=" . $article_id);
    }


    public function flagComment()
    {
        $flag = false;
        $id = ($_GET['id']);
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            $flag = false;
            die("Ho ! Fallait préciser le paramètre id en GET !");
        } else {
            $flag = true;
            $this->model->flagComment($flag, $id);
            echo('Le commentaire a bien été signalé');
        }
    }

    public function findAllFlag()
    {
        $signalements = $this->model->findAllFlag();
        \Renderer::render('articles/showFlag', compact('signalements'));
    }

    public function showNewFlag()
    {
        $signalements = $this->model->findAllFlag();
        \Renderer::render('articles/showNewFlag', compact('signalements'));
    }

    /*if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
        die("Ho ! Fallait préciser le paramètre id en GET !");
    }

    $id = $_GET['id'];


     * 3. Vérification de l'existence du commentaire

    $signalement = $this->model->find($id);
    if (!$signalement) {
        die("Aucun commentaire n'a l'identifiant $id !");
    }


     * 4. Suppression réelle du commentaire
     * On récupère l'identifiant de l'article avant de supprimer le commentaire

    $id = $signalement['id'];
    $this->model->findAllFlag($id);
}
    \Renderer::render('articles/showFlag', compact('author','content'));
*/

    public function deleteCommentFlag()
    {

        /**
         * 1. Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification de l'existence du commentaire
         */
        $signalements = $this->model->find($id);
        if (!$signalements) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        $this->model->delete($id);
        /**
         * 5. Redirection vers l'article en question
         */

        \Http::redirect("index.php?controller=commentController&task=findAllFlag");

    }

    public function updateCommentFlag()
    {

        /**
         * 1. Récupération du paramètre "id" en GET
         */

        $id = ($_GET['id']);
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        } else {
            $flag = false;
            $this->model->updateCommentFlag($flag, $id);
        }

        \Http::redirect("index.php?controller=commentController&task=showNewFlag");



        /**
         * 3. Vérification de l'existence du commentaire
         */



        /**
         * 4. Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        /**
         * 5. Redirection vers l'article en question
         */


    }
}

