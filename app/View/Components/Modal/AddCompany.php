<?php

namespace App\View\Components\Modal;

use App\Contracts\EntityContract;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Closure;

class AddCompany extends Component
{
    protected $entityContract;

    public function __construct(
        EntityContract $entityContract
    )
    {
        $this->entityContract = $entityContract;
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        $suppliers = $this->entityContract->getSupplierSelect();

        return view('components.modal.add-company', [
            'suppliers' => $suppliers,
        ]);
    }
}
