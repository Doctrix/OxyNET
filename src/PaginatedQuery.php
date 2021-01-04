<?php

namespace App;

use \PDO;

class PaginatedQuery {

    private $query;
    private $queryCount;
    private $pdo;
    private $perPage;
    private $count;
    private $items;

    public function __construct(
        string $query,
        string $queryCount,
        $pdo,
        int $perPage = 12
        )
    {
        $this->query = $query;
        $this->queryCount = $queryCount;
        $this->pdo = $pdo;
        $this->perPage = $perPage;
    }
    public function obtenirItems(string $classMapping): array
    {
        if ($this->items === null) {
        $currentPage = $this->obtenirCurrentPage();
        $pages = $this->obtenirPages();
        if ($currentPage > $pages) {
            throw new \Exception('Cette page n\'existe pas');
        }
        $offset = $this->perPage * ($currentPage - 1);
        $this->items = $this->pdo->query(
            $this->query . 
            " LIMIT {$this->perPage} OFFSET $offset")
            ->fetchAll(PDO::FETCH_CLASS, $classMapping);
        }
        return $this->items;
    }
    public function previousLink(string $link): ?string
    {
        $currentPage = $this->obtenirCurrentPage();
        if ($currentPage <= 1) return null;
        if ($currentPage > 2) $link .= "?page=" . ($currentPage - 1);
        return <<<HTML
        <a href="{$link}" class="btn btn-primary">&laquo; Page précédente</a>
HTML;
    }
    public function nextLink(string $link): ?string
    {
        $currentPage = $this->obtenirCurrentPage();
        $pages = $this->obtenirPages();
        if ($currentPage >= $pages) return null;
        $link .= "?page=" . ($currentPage + 1);
        return <<<HTML
        <a href="{$link}" class="btn btn-info ml-auto">Page suivante &raquo;</a>
HTML;
    }
    public function obtenirCurrentPage(): int
    {
        return URL::obtenirPositiveInt('page', 1);
    }
    private function obtenirPages(): int
    {
        if ($this->count === null){
            $this->count = (int)$this->pdo
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM)[0];
        }
        return ceil($this->count / $this->perPage);
    }
}