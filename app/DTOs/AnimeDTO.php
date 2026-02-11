<?php

namespace App\DTOs;

class AnimeDTO
{
    public readonly int $mal_id;
    public readonly string $title;
    public readonly ?string $synopsis;
    public readonly ?string $image_url;
    public readonly ?float $score;
    public readonly ?int $episodes;
    /** @var string[] */
    public readonly array $genres;

    public function __construct(array $data)
    {
        $this->mal_id = (int) $data['mal_id'];
        $this->title = $data['title'] ?? '';
        $this->synopsis = $data['synopsis'] ?? null;
        $this->image_url = $data['image_url'] ?? null;
        $this->score = isset($data['score']) ? (float) $data['score'] : null;
        $this->episodes = isset($data['episodes']) ? (int) $data['episodes'] : null;
        $this->genres = $data['genres'] ?? [];
    }
}
