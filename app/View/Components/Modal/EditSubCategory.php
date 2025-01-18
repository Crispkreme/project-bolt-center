<?php

namespace App\View\Components\Modal;

use App\Contracts\CategoryContract;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class EditSubCategory extends Component
{
    protected $categoryContract;

    public function __construct(CategoryContract $categoryContract)
    {
        $this->categoryContract = $categoryContract;
    }

    public function render(): View|Closure|string
    {
        $categories = $this->categoryContract->getCategory();

        return view('components.modal.edit-sub-category', [
            'categories' => $categories,
        ]);
    }
}
