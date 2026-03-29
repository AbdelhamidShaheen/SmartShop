<?php

namespace App\Http\Services\Interfaces;

interface IRecommendationService
{
    public function getRecommendations($userHistory = []);
}
