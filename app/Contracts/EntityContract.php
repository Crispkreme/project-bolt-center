<?php

namespace App\Contracts;

interface EntityContract {

    public function updateOrCreateEntity($data);
    public function getAllEntityByType($entity_type);
    public function findEntityById($id);
    public function getEntityById($id, $role);
    public function deleteEntityById($id);
    public function getSupplierSelect();
}