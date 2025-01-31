<?php

namespace App\Contracts;

interface ProductImageContract {

    public function updateOrCreateProductImage($data);
    public function getProductImageById($id);
}