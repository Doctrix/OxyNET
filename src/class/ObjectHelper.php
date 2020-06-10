<?php

namespace App;

class ObjectHelper {

    public static function hydrate($object, array $data, array $fields)
    {
        foreach($fields as $field) {
            $method = 'definir' . str_replace(' ', '', ucwords(str_replace('_', ' ', $field)));
            $object->$method($data[$field]);
        }
    }
}