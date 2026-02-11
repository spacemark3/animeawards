<?php

namespace App\Services\Jikan;

use App\DTOs\AnimeDTO;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class AnimeMapper
{
    public static function map(array $jikanData): AnimeDTO
    {
        return new AnimeDTO([
            'mal_id' => (int) $jikanData['mal_id'],
            'title' => $jikanData['title'] ?? '',
            'synopsis' => $jikanData['synopsis'] ?? null,
            'image_url' => Arr::get($jikanData, 'images.jpg.image_url', null),
            'score' => isset($jikanData['score']) ? (float) $jikanData['score'] : null,
            'episodes' => isset($jikanData['episodes']) ? (int) $jikanData['episodes'] : null,
            'genres' => collect($jikanData['genres'] ?? [])
                            ->pluck('name')
                            ->toArray(),
        ]);
    }
}
