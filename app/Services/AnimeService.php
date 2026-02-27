<?php

namespace App\Services;

use App\Models\Anime;

class AnimeService
{       
public $animes;
public function loadAnimes() {
       return $this->animes = Anime::inRandomOrder()->take(12)->get();
    }
}
