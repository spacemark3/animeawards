<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AnimeAdderService;
use Exception;

class PostCreate extends Component
{
    public $title = '';
    public $synopsis = '';
    public $errorMessage = 'non è stato possibile creare l\'anime';
    protected $rules = [
        'title' => 'required|string|max:255',
        'synopsis' => 'required|string',
    ];
    public function save(AnimeAdderService $animeAdderService)
    {
        try {
            $validated = $this->validate();
            $animeAdderService->addAnime($validated);

            session()->flash('success', 'Anime created successfully!');
            $this->reset();
        } catch (Exception $e) {
            return redirect('/post/create')->with('error', 'Failed to create anime: ' . $this->errorMessage);
        }
    }
    public function render()
    {
        // Return the component view. Use the layout in the Blade view itself.
        return view('livewire.post-create');
    }
}
