<?php

namespace App\Jobs;

use App\Http\Services\Interfaces\IRecommendationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductsRecomendations implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $matchProducts = [])
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(IRecommendationService::class)->getRecommendations($this->matchProducts);
        //
    }
}
