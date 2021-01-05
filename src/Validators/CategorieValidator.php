<?php
namespace App\Validators;

use Table\CategorieTable;

class CategorieValidator extends AbstractValidator {

    public function __construct(array $data, CategorieTable $table, ?int $id = null)
    {
        parent::__construct($data);
        $this->validator->rule('required',['name','slug']);
        $this->validator->rule('lengthBetween',['name','slug'],3,200);
        $this->validator->rule('slug','slug');
        $this->validator->rule(function($field, $value) use ($table, $id){
            return !$table->exists($field, $value, $id);   
        },['slug','name'], "Cette valeur est déjà utilisée");
    }
}