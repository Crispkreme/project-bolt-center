<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditEmployee extends Component
{
    public $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function render(): View|Closure|string
    {
        return view('components.form.edit-employee', [
            'account' => $this->account,
        ]);
    }
}
