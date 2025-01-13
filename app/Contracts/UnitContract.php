<?php

namespace App\Contracts;

interface UnitContract {

    public function getAllUnit();
    public function updateOrCreateUnit($data);
}
