<?php

namespace App\Contracts;

interface EntityContract {

    public function updateOrCreateEntity($data);
    public function getAllEntityByType($entity_type);
}