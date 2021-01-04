<?php
namespace Model\Table;

use Model\Classes\Categorie;
use \PDO;

final class CategorieTable extends Table {

    protected $table = 'categorie';
    protected $class = Categorie::class;

    /**
     * @param Model\Classes\Article[] $articles
     */
    public function hydrateArticles(array $articles): void
    {
        $articlesByID = [];
        foreach($articles as $article) {
            $article->definirCategories([]);
            $articlesByID[$article->obtenirID()] = $article;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, ac.article_id
                    FROM article_categorie ac
                    JOIN categorie c ON c.id = ac.categorie_id
                    WHERE ac.article_id IN (' . implode(',', array_keys($articlesByID)) . ')'
            )->fetchAll(PDO::FETCH_CLASS, $this->class);
        foreach($categories as $categorie){
            $articlesByID[$categorie->obtenirArticleID()]->ajouterUneCategorie($categorie);
        }
    }

    public function all (): array
    {  
        return $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY id DESC");
    }

    public function list (): array
    {
        $categories = $this->queryEtFetchAll("SELECT * FROM {$this->table} ORDER BY nom ASC");
        $results = [];
        foreach($categories as $categorie) {
            $results[$categorie->obtenirID()] = $categorie->obtenirNom();

        }
        return $results;
    }

}