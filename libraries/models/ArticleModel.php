<?php

namespace Models;
use Models\Model;

class   ArticleModel extends Model{

        protected $table = "articles";
        
    public function updateArticle(string $title, string $introduction, string $content,  int $id)
    {
        $query = $this->pdo->prepare("UPDATE articles SET title = :title,  introduction = :introduction, content = :content WHERE id = :id");
        $query->execute(compact('title', 'introduction', 'content', 'id'));
    }

    public function insertArticle(string $title, string $introduction, string $content)
    {
        $query = $this->pdo->prepare("INSERT INTO articles SET title = :title, introduction = :introduction, content = :content, created_at = NOW()");
        $query->execute(compact('title', 'introduction', 'content'));
    }

}