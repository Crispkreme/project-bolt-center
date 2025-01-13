<?php

namespace App\Contracts;

interface CategoryContract {

    public function getAllCategory();
    public function updateOrCreateCategory($data);
}
