<?php

namespace App\Contracts;

interface UserContract {

    public function getAllUser();
    public function getAllEmployeeByUser();
    public function updateOrCreateUser($data);
    public function getAllEmployeeByUserId($id);
}
