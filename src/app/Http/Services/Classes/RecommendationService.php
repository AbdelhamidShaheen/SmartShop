<?php

namespace App\Http\Services\Classes;

use App\Http\Services\Interfaces\IRecommendationService;
use App\Models\Product;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Cache;

class RecommendationService implements IRecommendationService
{
    public function getRecommendations($userHistory = [])
    {

        $allProducts = Product::all();
        if (! $userHistory) {
            return $allProducts->take(3);
        }

        $userHistory = Product::WhereIn('id', $userHistory)->orderBy('id')->get(['id', 'name', 'description'])->toArray();

        $prompt = 'You are an e-commerce recommender. 
                   User history: '.json_encode($userHistory).'
                   Available products: '.json_encode($allProducts->map->only(['id', 'name', 'description'])).'
                   Return ONLY a JSON array of the top 3 recommended product IDs.';

        try { // to handle quota excptions for gemini

            $result = Cache::rememberForever('products_'.json_encode($userHistory), function () use ($prompt) {
                return Gemini::generativeModel('gemini-2.5-flash')->generateContent($prompt);
            });
        } catch (\Throwable $th) {

            return $allProducts->take(3);
        }

        // Clean the response (LLMs sometimes wrap JSON in markdown blocks)
        $jsonResponse = str_replace(['```json', '```'], '', $result->text());

        $recomendationsIds = json_decode(trim($jsonResponse), true);

        return $recomendationsIds ? $allProducts->whereIn('id', $recomendationsIds) : $allProducts->take(3);
    }
}
