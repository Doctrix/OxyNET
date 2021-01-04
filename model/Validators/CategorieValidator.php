<?php
namespace Classe\Validators;

use Classe\Table\CategorieTable;

class CategorieValidator extends AbstractValidator {

    public function __construct(array $data, CategorieTable $table, ?int $id = null)
    {
        parent::__construct($data);
        $this->validator->rule('required',['nom','slug']);
        $this->validator->rule('lengthBetween',['nom','slug'],3,200);
        $this->validator->rule('slug','slug');
        $this->validator->rule(function($field, $value) use ($table, $id){
            return !$table->exists($field, $value, $id);   
        },['slug','nom'], "Cette valeur est déjà utilisée");
    }
}