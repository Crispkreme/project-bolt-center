<?php

namespace App\Contracts;

interface SubCategoryContract {

    public function getAllSubCategory();
    public function updateOrCreateSubCategory($data);
}
