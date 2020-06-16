<?php
namespace App\Table;

use App\PaginatedQuery;
use App\Model\Article;

final class ArticleTable extends Table {

    protected $table = 'article';
    protected $class = Article::class;

    public function MajArticle (Article $article): void
    {
        $this->MAJ([
            'titre' => $article->obtenirTitre(),
            'slug' => $article->obtenirSlug(),
            'contenu' => $article->obtenirContenu(),
            'extrait' => $article->obtenirExtrait(),
            'lien' => $article->obtenirLien(),
            'date_de_creation' => $article->obtenirDateDeCreation()->format('Y-m-d H:i:s')
        ], $article->obtenirID());

    }

    public function CreerArticle (Article $article): void
    {
        $id = $this->Creer([
            'titre' => $article->obtenirTitre(),
            'slug' => $article->obtenirSlug(),
            'contenu' => $article->obtenirContenu(),
            'extrait' => $article->obtenirExtrait(),
            'lien' => $article->obtenirLien(),
            'date_de_creation' => $article->obtenirDateDeCreation()->format('Y-m-d H:i:s')
        ]);
        $article->definirID($id);
    }

    public function attachCategories (int $id, array $categories)
    {
        $this->pdo->exec('DELETE FROM article_categorie WHERE article_id = ' . $id);
        $query = $this->pdo->prepare('INSERT INTO article_categorie SET article_id = ?, categorie_id = ?');
        foreach($categories as $categorie) {
            $query->execute([$id, $categorie]);
        }
    }

    public function trouverPaginer () 
    {  
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->table} ORDER BY date_de_creation DESC",
            "SELECT COUNT(id) FROM {$this->table}",
            $this->pdo
        );
        $articles = $paginatedQuery->obtenirItems(Article::class);
        (new CategorieTable($this->pdo))->hydrateArticles($articles);
        return [$articles, $paginatedQuery];
    }

    public function trouverPaginerPourLaCategorie (int $categorieID)
    {
        $paginatedQuery = new PaginatedQuery(
            "SELECT a.* FROM {$this->table} a JOIN article_categorie ac ON ac.article_id = a.id WHERE ac.categorie_id = {$categorieID} ORDER BY date_de_creation DESC",
            "SELECT COUNT(categorie_id) FROM article_categorie WHERE categorie_id = {$categorieID}",
            $this->pdo
        );
        $articles = $paginatedQuery->obtenirItems(Article::class);
        (new CategorieTable($this->pdo))->hydrateArticles($articles);
        return [$articles, $paginatedQuery];
    }
}