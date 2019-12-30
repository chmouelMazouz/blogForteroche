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

        $email = '';

        if ($_POST['email'] != "") {
            $email = htmlspecialchars($_POST['email']);
        }

        $pseudo = '';
        if ($_POST['pseudo'] != "") {
            $pseudo = htmlspecialchars($_POST['pseudo']);
        }

        $password = '';
        if ($_POST['password'] != "") {
            $password = htmlspecialchars($_POST['password']);
        }
        $admin = new AdminModel();
        $password = $admin->hashPassword($password);
        $admin->register($email, $pseudo, $password);
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        \Http::redirect('index.php');
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
                \Http::redirect('index.php');
            }else{
                \Http::redirect('index.php?controller=adminController&task=login&connect=false');
            }

        }else{
            \Http::redirect('index.php?controller=adminController&task=login&ident=empty');
        }


    }

}


