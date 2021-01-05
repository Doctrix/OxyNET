<?php
namespace Table;

use Model\Categorie;
use \PDO;

final class CategorieTable extends Table {

    protected $table = 'categorie';
    protected $class = Categorie::class;

    /**
     * @param Model\Classes\Post[] $posts
     */
    public function hydratePosts(array $posts): void
    {
        $postsByID = [];
        foreach($posts as $post) {
            $post->setCategories([]);
            $postsByID[$post->getID()] = $post;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, ac.post_id
                    FROM post_categorie ac
                    JOIN categorie c ON c.id = ac.categorie_id
                    WHERE ac.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach($categories as $categorie){
            $postsByID[$categorie->getPostID()]->ajouterUneCategorie($categorie);
        }
    }

    public function all (): array
    {  
        return $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY id DESC");
    }

    public function list (): array
    {
        $categories = $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY name ASC");
        $results = [];
        foreach($categories as $categorie) {
            $results[$categorie->getID()] = $categorie->getName();

        }
        return $results;
    }

}