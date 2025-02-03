<?php

namespace App\Contracts;

interface ExpensesContract {

    public function getAllExpenses();
    public function updateOrCreateExpenses($data);
}
