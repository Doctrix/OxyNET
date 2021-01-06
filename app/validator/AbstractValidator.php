<?php
namespace Validator;

use Controller\Validator;

abstract class AbstractValidator {
    
    protected $data;
    protected $validator;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validator = new Validator($data);
    }

    public function validate(): bool
    {
        return $this->validator->validate();
    }

    public function errors(): array
    {
        return $this->validator->errors();
    }
}