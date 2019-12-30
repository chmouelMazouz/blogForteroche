<?php

namespace Models;


abstract class Model
{
    protected $pdo;
    protected $table;


    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
// On exécute la requête en précisant le paramètre :article_id
        $query->execute(['id' => $id]);

// On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
        return $item;
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * Retourne  la liste des articles par date de création
     * @return array
     */

    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
// On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;

    }

    public function findAllWithArticle(int $article_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare("INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()");
        $query->execute(compact('author', 'content', 'article_id'));
    }

    public function insertArticle(string $title, string $introduction, string $content, string $slug): void
    {
        $query = $this->pdo->prepare("INSERT INTO articles SET title = :title, slug=:slug, introduction = :introduction, content = :content, created_at = NOW()");
        $query->execute(compact('title', 'slug', 'introduction', 'content'));
    }


    public function updateArticle(string $title, string $introduction, string $content, string $slug, int $id): void
    {

        $query = $this->pdo->prepare("UPDATE articles SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW() WHERE id = :id");
        $query->execute(compact('title', 'slug', 'introduction', 'content', 'id'));
    }
//
//
//    public function hashPassword($password)
//    {
//        return password_hash($password, PASSWORD_BCRYPT);
//    }
//
//
//    public function register(string $email, string $pseudo, string $password): void
//    {
//        $query = $this->pdo->prepare("INSERT INTO admins SET email = :email, pseudo = :pseudo,  password = :password, created_at = NOW()");
//        $query->execute(compact('email', 'pseudo', 'password'));
//    }
//
//    public function login(string $pseudo, string $password)
//    {
//
//        $query = $this->pdo->prepare('SELECT * FROM admins WHERE (pseudo = :pseudo)');
//        $query->bindValue(':pseudo', $pseudo);
//        $query->execute();
//        $result = $query->fetch();
//
//        var_dump($result);
//
//
//        if (password_verify($password, $result["password"])) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function flagComment(bool $flag, int $id): void
    {

        $query = $this->pdo->prepare("UPDATE comments SET flag = :flag WHERE id = :id");
        $query->execute(compact('flag', 'id'));
    }

    public function findAllFlag()
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE flag = true");
        $query->execute();
        $signalements = $query->fetchAll();
        return $signalements;

    }

}