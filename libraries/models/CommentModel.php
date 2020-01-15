<?php
namespace Models;

use Models\Model;

class CommentModel extends Model{

    protected $table = "comments";

    public function findAllWithArticle(int $article_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

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

    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare("INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()");
        $query->execute(compact('author', 'content', 'article_id'));
    }

    public function deleteCommentFlag(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM comments WHERE id = :id");
        $query->execute(['id' => $id]);
    }

}