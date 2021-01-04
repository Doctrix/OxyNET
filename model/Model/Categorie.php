<?php
namespace Classe\Model;

class Categorie {

    private $id;
    private $slug;
    private $nom;
    private $article_id;
    private $article;
    
    public function obtenirID (): ?int {
        return $this->id;
    }

    public function definirID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function obtenirSlug (): ?string {
        return $this->slug;
    }

    public function definirSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function obtenirNom (): ?string {
        return $this->nom;
    }

    public function definirNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function obtenirArticleID (): ?int
    {
        return $this->article_id;
    }

    public function fixerArticle (Article $article)
    {
        $this->article = $article;
    }
}