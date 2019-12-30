<?php

namespace Models;


use Models\Model;
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

        var_dump($result);


        if (password_verify($password, $result["password"])) {
            return true;
        } else {
            return false;
        }
    }


}