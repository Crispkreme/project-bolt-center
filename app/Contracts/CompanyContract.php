<?php

namespace App\Contracts;

interface CompanyContract {

    public function updateOrCreateCompany($data);
    public function getAllCompany();
    public function deleteCompanyById($id);
}