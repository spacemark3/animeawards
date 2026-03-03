<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PostCreate;
use App\Livewire\AnimeCollage;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/awge', AnimeCollage::class);

/**
 * Gruppo di rotte con prefisso "posts"
 * Tutte le rotte dentro questo gruppo avranno l'URL che inizia con /posts
 */
Route::prefix('post')->group(function () {

    /**
     * Rotta per creare un nuovo post
     * GET /posts/create
     * Monta il componente Livewire PostCreate, che contiene la logica per il form di creazione
     * Questa rotta NON richiede un controller, Livewire gestisce tutto
     */
    Route::get('/create', PostCreate::class)->name('post.create');

    /**
     * Rotta per visualizzare un singolo post
     * GET /posts/{id}
     * $id è il parametro dinamico dell'URL (ID del post)
     * Restituisce una risposta JSON con un messaggio dimostrativo
     * Nome della rotta: post.show
     */
    Route::get('/{id}', function ($id) {
        return response()->json([
            'message' => "Visualizza il post con ID: $id"
        ]);
    })->name('post.show');

    /**
     * Rotta per aggiornare un post esistente
     * PUT /posts/{id}
     * $id indica il post da aggiornare
     * In un'app reale qui chiameresti un controller o Livewire method per aggiornare i dati nel DB
     * Nome della rotta: post.update
     */
    Route::put('/{id}', function ($id) {
        return response()->json([
            'message' => "Aggiorna il post con ID: $id"
        ]);
    })->name('post.update');

    /**
     * Rotta per eliminare un post
     * DELETE /posts/{id}
     * $id indica il post da cancellare
     * In un'app reale qui chiameresti un controller o Livewire method per eliminare dal DB
     * Nome della rotta: post.delete
     */
    Route::delete('/{id}', function ($id) {
        return response()->json([
            'message' => "Elimina il post con ID: $id"
        ]);
    })->name('post.delete');
});

Route::get('/', function () {
    return view('anime.home');
});

require __DIR__ . '/settings.php';
