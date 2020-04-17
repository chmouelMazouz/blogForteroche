<?php
namespace Controllers;

use Models\AdminModel;

class AdminController extends Controller
{
    protected $modelName = AdminModel::class;

    public function registerAction()
    {
        \Renderer::render('articles/register', compact('admin'));

    }


    public function register()
    {

        $email = "";

        if ($_POST['email'] != "") {
            $email = htmlspecialchars($_POST['email']);
        }

        $pseudo = "";
        if ($_POST['pseudo'] != "") {
            $pseudo = htmlspecialchars($_POST['pseudo']);
        }

        $password = "";
        if ($_POST['password'] != "") {
            $password = htmlspecialchars($_POST['password']);
        }
        $admin = new AdminModel();
        $password = $admin->hashPassword($password);
        $admin->register($email, $pseudo, $password);
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        \Renderer::render('articles/registerConfirm');
    }

    public function login()
    {
        \Renderer::render('articles/login', compact('admin'));

    }
    public function loginAction()
{
    $admin= new AdminModel();
    $pseudo=$_POST['pseudo'];
    $password=$_POST['password'];
    if (!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $connect = $admin->login($pseudo,$password);
        if($connect){
            session_start();
            $_SESSION["pseudo"] = $pseudo;
            \Renderer::render('articles/layoutBackOffice');
        }else{
            \Http::redirect('index.php?controller=adminController&task=login&connect=false');
        }

    }else{
        \Http::redirect('index.php?controller=adminController&task=login&ident=empty');
    }


}
    private function randomPassword($size)
    {
        // Initialisation des caractères utilisables
        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $password ="";
        for($i=0;$i<$size;$i++)
        {

            $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }

        return $password;
    }
    public function newPasswordByMail()
    {
        $email = $_POST['email'];
        $admin = new AdminModel();

        $result = $admin->findMail($email);
        if ($result) {
            $size = 10;
            $new_pass = $this->randomPassword($size);

            $admin->updatePassword($email, $new_pass);

            $to = $email;
            $subject = "Votre nouveau mot de passe";
            $message = "Voici votre nouveau mot de passe: " . $new_pass;
            $headers = 'From: chmouelmazouz@gmail.com';

            $this->sendMail($to, $subject, $message, $headers);
            \Renderer::render('articles/newPasswordByMail');


        }else{
            echo 'Introuvable';
        }
    }

    public function sendMail($to,$subject,$message,$headers){

        mail($to, $subject, $message,$headers);
    }



    public function updateCount(){


            // On part du principe qu'on ne possède pas de param "id"


        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool

            \Renderer::render('articles/updateCount');



    }

    public function updateMyCount(){
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $admin = new AdminModel();
        $admin->updateMyCount($pseudo,$password);
        \Renderer::render('articles/updateMyCount');


    }

    public function logoutAction()
    {
        session_start();
// Unset all of the session variables.
        unset($_SESSION['pseudo']);
// Finally, destroy the session.
        session_destroy();

// Include URL for Login page to login again.
        \Http::redirect('index.php');
        exit;
    }

    public function resetPasswordForm()
    {
        \Renderer::render('articles/resetPasswordForm', compact('admin'));

    }


    public function showAdmin(){
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
            \Renderer::render('articles/showAdmin',compact('articles'));
        }

    }

    public function showBackOffice(){
        session_start();
        \Renderer::render('articles/layoutBackOffice');
    }

}


