<?php

namespace App\Services\Jikan;

use App\Models\Genre;

class GenreService
{
    /**
     * Ensure genres exist in DB and return their IDs
     *
     * @param array $jikanGenres
     * @return array
     */
    public static function resolveGenres(array $jikanGenres): array
    {
        $genreIds = [];

        foreach ($jikanGenres as $genre) {
            $dbGenre = Genre::firstOrCreate(
                ['mal_id' => $genre['mal_id']],
                ['name' => $genre['name']]
            );
            $genreIds[] = $dbGenre->id;
        }
        return $genreIds;
    }
}
