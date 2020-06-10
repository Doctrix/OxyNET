<?php
namespace App\Model;

use App\Helpers\Text;
use \DateTime;

class Article {

    private $id;
    private $slug;
    private $titre;
    private $contenu;
    private $extrait;
    private $lien;
    private $date_de_creation;
    private $categories = [];
    
    // OBTENIR (get)
    public function obtenirID (): ?int
    {
        return $this->id;
    }

    public function definirID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function obtenirTitre (): ?String
    {
        return nl2br($this->titre);
    }

    public function definirTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function obtenirSlug (): ?string
    {
        return nl2br($this->slug);
    }

    public function definirSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function obtenirLien (): ?string
    {
        return nl2br($this->lien);
    }

    public function definirLien(string $lien): self
    {
        $this->lien = $lien;
        return $this;
    }

    public function obtenirDateDeCreation (): DateTime
    {
        return new DateTime($this->date_de_creation);
    }

    public function definirDateDeCreation(string $date): self
    {
        $this->date_de_creation = $date;
        return $this;
    }

    public function obtenirExtrait (): ?string
    {
        return nl2br($this->extrait);
    }

    public function definirExtrait(string $extrait): self
    {
        $this->extrait = $extrait;
        return $this;
    }

    public function obtenirContenu (): ?string
    {
        return nl2br($this->contenu);
    }

    public function definirContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function obtenirContenuFormater (): ?string
    {
        return nl2br(e($this->contenu));
    }

    public function obtenirExcerpt (): ?string
    {
        if ($this->contenu === null) 
        {
            return null;
        }
        return nl2br(Text::excerpt($this->contenu, 150));
    }

    /**
     * @return Categorie[]
     */
    public function obtenirCategories (): array
    {
        return $this->categories;
    }

    public function definirCategories (array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }
    public function obtenirCategoriesIds (): array
    {
        $ids = [];
        foreach($this->categories as $categorie) {
            $ids[] = $categorie->obtenirID();
        }
        return $ids;
    }
    public function ajouterUneCategorie(Categorie $categorie): void
    {
        $this->categories[] = $categorie;
        $categorie->fixerArticle($this);
    }
}