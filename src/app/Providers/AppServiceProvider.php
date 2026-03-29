<?php

namespace App\Providers;

use App\Http\Services\Classes\RecommendationService;
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
