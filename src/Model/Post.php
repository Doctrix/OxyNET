<?php
namespace Model;

use App\Helpers\Text;
use \DateTime;

class Post {

    private $id;
    private $slug;
    private $picture_id;
    private $title;
    private $content;
    private $extrait;
    private $url;
    private $date_de_creation;
    private $categories = [];
    
    // OBTENIR (get)
    public function getID (): ?int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPicture (): ?String
    {
        return $this->picture_id;
    }

    public function setPicture(string $picture_id): self
    {
        $this->picture_id = $picture_id;
        return $this;
    }

    public function getTitle (): ?String
    {
        return nl2br($this->title);
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug (): ?string
    {
        return nl2br($this->slug);
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getUrl (): ?string
    {
        return nl2br($this->url);
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getDateDeCreation (): DateTime
    {
        return new DateTime($this->date_de_creation);
    }

    public function setDateDeCreation(string $date): self
    {
        $this->date_de_creation = $date;
        return $this;
    }

    public function getExtrait (): ?string
    {
        return nl2br($this->extrait);
    }

    public function setExtrait(string $extrait): self
    {
        $this->extrait = $extrait;
        return $this;
    }

    public function getContent (): ?string
    {
        return nl2br($this->content);
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getContentFormater (): ?string
    {
        return nl2br(e($this->content));
    }

    public function getExcerpt (): ?string
    {
        if ($this->content === null) 
        {
            return null;
        }
        return nl2br(Text::excerpt($this->content, 150));
    }

    /**
     * @return Categorie[]
     */
    public function getCategories (): array
    {
        return $this->categories;
    }

    public function setCategories (array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }
    public function getCategoriesIds (): array
    {
        $ids = [];
        foreach($this->categories as $categorie) {
            $ids[] = $categorie->getID();
        }
        return $ids;
    }
    public function ajouterUneCategorie(Categorie $categorie): void
    {
        $this->categories[] = $categorie;
        $categorie->setPostID($this->title);
    }
}