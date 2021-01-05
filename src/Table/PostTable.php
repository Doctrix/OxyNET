<?php
namespace Table;

use App\PaginatedQuery;
use Model\Post;

final class PostTable extends Table {

    protected $table = 'post';
    protected $class = Post::class;

    public function MajPost (Post $post): void
    {
        $this->MAJ([
            'title' => $post->getTitle(),
            'post_id' => $post->getPicture(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'extrait' => $post->getExtrait(),
            'lien' => $post->geturl(),
            'date_de_creation' => $post->getDateDeCreation()->format('Y-m-d H:i:s')
        ], $post->getID());

    }

    public function CreerPost (Post $post): void
    {
        $id = $this->Creer([
            'title' => $post->getTitle(),
            'post_id' => $post->getPicture(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'extrait' => $post->getExtrait(),
            'lien' => $post->getUrl(),
            'date_de_creation' => $post->getDateDeCreation()->format('Y-m-d H:i:s')
        ]);
        $post->getID($id);
    }

    public function attachCategories (int $id, array $categories)
    {
        $this->pdo->exec('DELETE FROM post_categorie WHERE post_id = ' . $id);
        $query = $this->pdo->prepare('INSERT INTO post_categorie SET post_id = ?, categorie_id = ?');
        foreach($categories as $categorie) {
            $query->execute([$id, $categorie]);
        }
    }

    public function findPaginer () 
    {  
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY date_de_creation DESC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategorieTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

    public function findPaginerPourLaCategorie (int $categorieID)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT a.* FROM {$this->table} a JOIN post_categorie ac ON ac.post_id = a.id WHERE ac.categorie_id = {$categorieID} ORDER BY date_de_creation DESC",
            "SELECT COUNT(categorie_id) FROM post_categorie WHERE categorie_id = {$categorieID}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategorieTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }
}