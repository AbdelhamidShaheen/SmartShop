<?php

namespace App\Providers;

use App\Http\Services\Classes\AuthService;
use App\Http\Services\Classes\ProductService;
use App\Http\Services\Classes\RecommendationService;
use App\Http\Services\Interfaces\IAuthService;
use App\Http\Services\Interfaces\IProductService;
use App\Http\Services\Interfaces\IRecommendationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(IRecommendationService::class, RecommendationService::class);
        $this->app->scoped(IProductService::class, ProductService::class);
        $this->app->scoped(IAuthService::class, AuthService::class);
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
