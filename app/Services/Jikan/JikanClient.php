<?php

namespace App\Services\Jikan;
use Illuminate\Support\Facades\Http;

class JikanClient
{
    protected string $baseUrl = 'https://api.jikan.moe/v4/top/anime';

    public function fetchTopAnime(int $page = 1): array
    {
        $response = Http::get("{$this->baseUrl}",
        [
            'page' => $page,
        ]);
        if($response->failed()){
            throw new \Exception("Failed to complete the operation");
        }
        return $response->json()['data'] ?? [];
    }
}
