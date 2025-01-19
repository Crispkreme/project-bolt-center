<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Contracts\StockContract;
use App\Contracts\SubCategoryContract;
use App\Contracts\UnitContract;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\UnitRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    protected $repositories = [
        UnitContract::class => UnitRepository::class,
        CategoryContract::class => CategoryRepository::class,
        SubCategoryContract::class => SubCategoryRepository::class,
        ProductContract::class => ProductRepository::class,
        StockContract::class => StockRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach($this->repositories as $contract => $repository) {
            $this->app->singleton($contract,$repository);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
