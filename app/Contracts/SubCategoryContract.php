<?php

namespace App\Contracts;

interface SubCategoryContract {

    public function getAllSubCategory();
    public function findSubCategoryById($id);
    public function updateOrCreateSubCategory($data);
}
