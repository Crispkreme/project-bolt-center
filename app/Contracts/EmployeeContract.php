<?php

namespace App\Contracts;

interface EmployeeContract {

    public function updateOrCreateEmployee($data);
    public function getLastEmployee();
}
