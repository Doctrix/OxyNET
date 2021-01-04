<?php
namespace Model\Validators;

use Model\Table\ArticleTable;

class ArticleValidator extends AbstractValidator {

    public function __construct(array $data, ArticleTable $table, ?int $articleID = null, array $categories)
    {
        parent::__construct($data);
        $this->validator->rule('required',['titre','slug']);
        $this->validator->rule('lengthBetween',['titre','slug'],3,200);
        $this->validator->rule('lengthBetween',['extrait'],15,255);
        $this->validator->rule('lengthBetween',['lien'],10,80);
        $this->validator->rule('slug','slug');
        $this->validator->rule('subset','categories_ids', array_keys($categories));
        $this->validator->rule(function($field, $value) use ($table, $articleID){
            return !$table->exists($field, $value, $articleID);   
        },['slug','titre'], "Cette valeur est déjà utilisée");
    }
}