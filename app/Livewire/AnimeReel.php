<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Anime;

class AnimeReel extends Component
{
    public $topAnimes;

    public function mount()
    {
        // Prendiamo i top 15 anime per punteggio
        $this->topAnimes = Anime::whereNotNull('score')
                                ->orderBy('score', 'desc')
                                ->take(15)
                                ->get();
    }

    public function render()
    {
        return view('livewire.anime-reel');
    }
}