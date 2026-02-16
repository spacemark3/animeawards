<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Anime;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')] // This tells Livewire: "Don't use the sidebar layout!"
class AnimeCollage extends Component
{
    public $animes;

    public function mount() {
        $this->loadAnimes();
    }

    public function loadAnimes() {
        $this->animes = Anime::inRandomOrder()->take(12)->get();
    }

    public function render() {
        return view('livewire.anime-collage');
    }
}