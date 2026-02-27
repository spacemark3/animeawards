<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AnimeCollage;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/awge', AnimeCollage::class);


require __DIR__.'/settings.php';
