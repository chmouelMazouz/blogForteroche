<?php

namespace Models;


use Models\Model;
use Controllers\AdminController;
class AdminModel extends Model
{

    protected $table = "admins";



    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    public function register(string $email, string $pseudo, string $password): void
    {
        $query = $this->pdo->prepare("INSERT INTO admins SET email = :email, pseudo = :pseudo,  password = :password, created_at = NOW()");
        $query->execute(compact('email', 'pseudo', 'password'));
    }



    public function login(string $pseudo, string $password)
    {

        $query = $this->pdo->prepare('SELECT * FROM admins WHERE (pseudo = :pseudo)');
        $query->bindValue(':pseudo', $pseudo);
        $query->execute();
        $result = $query->fetch();

        //var_dump($result);


        if (password_verify($password, $result["password"])) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($email,$password){
        $password = $this->hashPassword($password);
        $query = $this->pdo->prepare("UPDATE admins SET password = :password WHERE email = :email");
        $query->execute(compact('email', 'password'));
    }



    public function updateMyCount($pseudo,$password){
        $password = $this->hashPassword($password);
        $query = $this->pdo->prepare("UPDATE admins SET password = :password where pseudo = :pseudo ");
        $query->execute(compact( 'password','pseudo'));
    }

    public function findMail($email): array
    {
        $query = $this->pdo->prepare("SELECT email FROM admins WHERE email = :email");
        $query->execute(['email' => $email]);
        $result = $query->fetchAll();
        return $result;
    }


}