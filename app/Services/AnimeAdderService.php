<?php

namespace App\Services;

use App\Models\Anime;
use Illuminate\Support\Facades\Validator;

class AnimeAdderService
{
    public function addAnime($animeData)
    {
        $validated = Validator::make($animeData, [
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
        ], [
            'title.required' => 'Il titolo é obbligatorio',
            'synopsis.required' => 'La descrizione é obbligatoria',
        ])->validate();
        
        return Anime::create($validated);
    }
}   
