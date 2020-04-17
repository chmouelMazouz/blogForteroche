<?php

namespace Models;
use Models\Model;

class   ArticleModel extends Model{

        protected $table = "articles";

    public function updateArticle(string $title,string $slug, string $introduction, string $content,  int $id): void
    {

        $query = $this->pdo->prepare("UPDATE articles SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW() WHERE id = :id");
        $query->execute(compact('title', 'slug', 'introduction', 'content', 'id'));
    }

    public function insertArticle(string $title, string $introduction, string $content, string $slug): void
    {
        $query = $this->pdo->prepare("INSERT INTO articles SET title = :title, slug=:slug, introduction = :introduction, content = :content, created_at = NOW()");
        $query->execute(compact('title', 'slug', 'introduction', 'content'));
    }

}