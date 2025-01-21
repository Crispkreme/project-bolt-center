<?php

namespace App\Contracts;

interface ProductContract {

    public function checkProductItemCode($data);
    public function updateOrCreateProduct($data);
    public function getAllProduct();
}