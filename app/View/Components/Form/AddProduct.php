<?php

namespace App\View\Components\Form;

use App\Contracts\CategoryContract;
use App\Contracts\SubCategoryContract;
use App\Models\SubCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddProduct extends Component
{
    protected $categoryContract;
    protected $subCategoryContract;

    public function __construct(
        CategoryContract $categoryContract,
        SubCategoryContract $subCategoryContract
    )
    {
        $this->categoryContract = $categoryContract;
        $this->subCategoryContract = $subCategoryContract;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categoryContract->getCategory();
        $subCategories = $this->subCategoryContract->getSubCategory();

        return view('components.form.add-product', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
