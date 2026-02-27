<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\AnimeService;

#[Layout('layouts.guest')] // This tells Livewire: "Don't use the sidebar layout!"
class AnimeCollage extends Component
{
    public $animes;

    public function mount(AnimeService $service) {
        $this->animes = $service->loadAnimes();
    }
    public function loadAnimes(AnimeService $service) {
        $this->animes = $service->loadAnimes();
    }
    public function render() {
        return view('livewire.anime-collage');
    }
}