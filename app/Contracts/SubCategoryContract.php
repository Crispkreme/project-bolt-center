<?php

namespace App\Contracts;

interface SubCategoryContract {

    public function getAllSubCategory();
    public function getSubCategory();
    public function findSubCategoryById($id);
    public function deleteSubCategoryById($id);
    public function updateOrCreateSubCategory($data);
    public function getSubCategorySelect();
}
