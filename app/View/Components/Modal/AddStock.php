<?php

namespace App\View\Components\Modal;

use App\Contracts\EntityContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddStock extends Component
{
    protected $entityContract;

    public function __construct(
        EntityContract $entityContract
    )
    {
        $this->entityContract = $entityContract;
    }
    
    public function render(): View|Closure|string
    {
        $suppliers = $this->entityContract->getSupplierSelect();

        return view('components.modal.add-stock', [
            'suppliers' => $suppliers,
        ]);
    }
}
