<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Anime;

class AnimeController extends Controller
{
 public function index()
 {
    $animes = Anime::all()->take(12)->paginate(6);
    return view('front.home', compact('animes'));
 }
}
