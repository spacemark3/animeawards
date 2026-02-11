<?php

namespace App\Services\Jikan;

use App\DTOs\AnimeDTO;
use App\Models\Anime;
use App\Models\Genre;

class AnimeImporter
{
    public function import(AnimeDTO $animeDTO): void
    {
        $anime = Anime::updateOrCreate(
            ['mal_id' => $animeDTO->mal_id],
            [
                'title' => $animeDTO->title,
                'synopsis' => $animeDTO->synopsis,
                'image_url' => $animeDTO->image_url,
                'score' => $animeDTO->score,
                'episodes' => $animeDTO->episodes,
            ]
        );
        $genreIds = [];
        foreach ($animeDTO->genres as $genreName) {
            $genre = Genre::firstOrCreate(['name' => $genreName]);
            $genreIds[] = $genre->id;
        }
        $anime->genres()->sync($genreIds);
    }
}
