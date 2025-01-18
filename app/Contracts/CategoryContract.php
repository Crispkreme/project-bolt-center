<?php

namespace App\Contracts;

interface CategoryContract {

    public function getAllCategory();
    public function getCategory();
    public function updateOrCreateCategory($data);
    public function findCategoryById($id);
    public function deleteCategoryById($id);
}
