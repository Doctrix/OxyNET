<?php
namespace Table;

use Model\Category;
use PDO;

final class CategoryTable extends Table {

    protected $table = 'category';
    protected $class = Category::class;

    /**
     * @param Model\Post[] $posts
     */
    public function hydratePosts(array $posts): void
    {
        $postsByID = [];
        foreach ($posts as $post) {
            $post->setCategories([]);
            $postsByID[$post->getID()] = $post;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, ac.post_id
                    FROM post_category ac
                    JOIN category c ON c.id = ac.category_id
                    WHERE ac.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach($categories as $category){
            $postsByID[$category->getPostID()]->addCategory($category);
        }
    }

    public function all(): array
    {  
        return $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY id DESC");
    }

    public function list(): array
    {
        $categories = $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY name ASC");
        $results = [];
        foreach ($categories as $category) {
            $results[$category->getID()] = $category->getName();

        }
        return $results;
    }

}