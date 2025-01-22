<?php

namespace App\Contracts;

interface CompanyContract {

    public function updateOrCreateCompany($data);
    public function getAllCompany();
    public function deleteCompanyById($id);
    public function findCompanyById($id);
}