<?php
namespace Model;

use Helper\Text;
use DateTime;

class Post
{
    private $id;
    private $slug;
    private $picture_id;
    private $title;
    private $content;
    private $excerpt;
    private $url;
    private $created_at;
    private $categories = [];
    
    // OBTENIR (get)
    public function getID(): ?int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPictureID(): ?String
    {
        return $this->picture_id;
    }

    public function setPictureID(string $picture_id): self
    {
        $this->picture_id = $picture_id;
        return $this;
    }

    public function getTitle(): ?String
    {
        return nl2br($this->title);
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): ?string
    {
        return nl2br($this->slug);
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getUrl(): ?string
    {
        return nl2br($this->url);
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return new DateTime($this->created_at);
    }

    public function setCreatedAt(string $date): self
    {
        $this->created_at = $date;
        return $this;
    }

    public function getContent(): ?string
    {
        return nl2br($this->content);
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getContentFormater(): ?string
    {
        return nl2br(e($this->content));
    }

    public function setExcerpt(string $excerpt): self
    {
        $this->excerpt = $excerpt;
        return $this;
    }

    public function getExcerpt(): ?string
    {
        return nl2br($this->excerpt);
    }
    
    public function getExcerptContent(): ?string
    {
        if ($this->content === null)
        {
            return null;
        }
        return nl2br(Text::excerpt($this->content, 150));
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }
    public function getCategoriesIds(): array
    {
        $ids = [];
        foreach ($this->categories as $category) {
            $ids[] = $category->getID();
        }
        return $ids;
    }
    public function addCategory(Category $category): void
    {
        $this->categories[] = $category;
        $category->setPostID($this->title);
    }
}
