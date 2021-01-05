<?php
namespace App\Validators;

use Table\PostTable;

class PostValidator extends AbstractValidator {

    public function __construct(array $data, PostTable $table, ?int $postID = null, array $categories)
    {
        parent::__construct($data);
        $this->validator->rule('required',['title','slug']);
        $this->validator->rule('lengthBetween',['title','slug'],3,200);
        $this->validator->rule('lengthBetween',['extrait'],15,255);
        $this->validator->rule('lengthBetween',['lien'],10,80);
        $this->validator->rule('slug','slug');
        $this->validator->rule('subset','categories_ids', array_keys($categories));
        $this->validator->rule(function($field, $value) use ($table, $postID){
            return !$table->exists($field, $value, $postID);   
        },['slug','title'], "Cette valeur est déjà utilisée");
    }
}