<?php

namespace App\View\Components\Form;

use App\Contracts\CategoryContract;
use App\Contracts\EntityContract;
use App\Contracts\SubCategoryContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditProduct extends Component
{
    protected $categoryContract;
    protected $subCategoryContract;
    protected $entityContract;
    public $productData;

    public function __construct(
        CategoryContract $categoryContract,
        SubCategoryContract $subCategoryContract,
        EntityContract $entityContract,
        $productData
    )
    {
        $this->categoryContract = $categoryContract;
        $this->subCategoryContract = $subCategoryContract;
        $this->entityContract = $entityContract;
        $this->productData = $productData;
    }

    public function render(): View|Closure|string
    {
        $categories = $this->categoryContract->getCategorySelect();
        $subCategories = $this->subCategoryContract->getSubCategorySelect();
        $suppliers = $this->entityContract->getSupplierSelect();

        return view('components.form.edit-product', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'suppliers' => $suppliers,
            'productData' => $this->productData,
        ]);
    }
}
