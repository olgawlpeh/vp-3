<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $games = Game::query()->orderBy('id', 'DESC')->paginate(6);
        return view('home', ['games'=>$games]);
    }
}
