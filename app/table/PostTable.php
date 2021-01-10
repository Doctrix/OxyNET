<?php
namespace Table;

use Controller\PaginatedQuery;
use Model\Post;

final class PostTable extends Table
{
    protected $table = 'post';
    protected $class = Post::class;

    public function updatePost(Post $post) : void
    {
        $this->update([
            'title' => $post->getTitle(),
            'picture_id' => $post->getPictureID(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'excerpt' => $post->getExcerptContent(),
            'url' => $post->getUrl(),
            'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        $post->getID();
    }

    public function createPost(Post $post) : void
    {
        $id = $this->create([
            'title' => $post->getTitle(),
            'picture_id' => $post->getPictureID(),
            'slug' => $post->getSlug(),
            'content' => $post->getContent(),
            'excerpt' => $post->getExcerptContent(),
            'url' => $post->getUrl(),
            'created_at' => $post->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        $post->getID($id);
    }

    public function attachCategories(int $id, array $categories)
    {
        $this->pdo->exec('DELETE FROM post_category WHERE post_id = ' . $id);
        $query = $this->pdo->prepare('INSERT INTO post_category SET post_id = ?, category_id = ?');
        foreach ($categories as $category) {
            $query->execute([$id, $category]);
        }
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $ok = $query->execute([$id]);
        if ($ok === false) {
            throw new \Exception("Impossible de supprimer l'enregistrement $id dans la table {$this->table}");
        }
    }

    public function findPaginated()
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY created_at DESC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }

    public function findPaginatedForCategory(int $categoryID)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT a.* FROM {$this->table} a JOIN post_category ac ON ac.post_id = a.id WHERE ac.category_id = {$categoryID} ORDER BY created_at DESC",
            "SELECT COUNT(category_id) FROM post_category WHERE category_id = {$categoryID}",
            $this->pdo
        );
        $posts = $paginatedQuery->getItems(Post::class);
        (new CategoryTable($this->pdo))->hydratePosts($posts);
        return [$posts, $paginatedQuery];
    }
}