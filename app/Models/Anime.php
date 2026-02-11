<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = [
        'mal_id',
        'title',
        'synopsis',
        'image_url',
        'score',
        'episodes',
    ];

    protected $casts = [
        'score'=>'decimal:2',
        'episodes'=>'integer',
    ];
    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'anime_genre');
    }
       public function syncGenres(array $genreIds): void
    {
        $this->genres()->sync($genreIds);
    }
}
