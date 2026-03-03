<?php

namespace App\Livewire;

use Livewire\Component;

class AnimeCard extends Component
{
    public $anime;
    public function mount($anime)
    {
        $this->anime = $anime;
    }
    public function render()
    {
        return view('livewire.anime-card');
    }
}